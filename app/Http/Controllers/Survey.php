<?php

namespace App\Http\Controllers;

use App\Models\AuditReport;
use App\Models\SurveyBusinessProfile;
use App\Models\SurveyEvaluation;
use App\Models\SurveyQuestionCategory;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Survey extends Controller
{
    public function index()
    {
        $surveys = SurveyBusinessProfile::with(['evaluations.question.category'])
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(6);

        return view('survey.index', compact('surveys'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validated = $request->validate([
                'company_name' => 'required',
                'contact_person' => 'required',
                'company_website' => 'required',
                'company_industry' => 'required',
                'service_request_type' => 'required|in:Process/Operations Optimization,Quality Assurance & Compliance,Project Management Excellence,CMMI for Service (SVC),CMMI for Development (DEV),ISO 9001: 2015 Quality Management System,ISO 27001 Information Security Management System,ISO 20000-1 IT Service Management System,ISO 45001 Occupational Health and Safety,Other',
                'questions' => 'required|array'
            ]);

            $businessProfile = SurveyBusinessProfile::create([
                'user_id' => auth()->id(),
                'company_name' => $validated['company_name'],
                'contact_person' => $validated['contact_person'],
                'company_website' => $validated['company_website'],
                'company_industry' => $validated['company_industry'],
                'service_request_type' => $validated['service_request_type'],
            ]);

            collect($request->questions)->each(function ($response, $questionId) use ($businessProfile) {
                $decoded = json_decode($response, true);

                if (!is_array($decoded) || !isset($decoded['text'], $decoded['score'])) {

                    return;
                }

                SurveyEvaluation::create([
                    'business_profile_id' => $businessProfile->id,
                    'question_id' => $questionId,
                    'response' => $decoded['text'],
                    'score' => $decoded['score'],
                ]);
            });

            DB::commit();

            return redirect()->back()->with('success', 'Survey saved successfully!');

        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Survey saving failed', ['error' => $e->getMessage()]);

            return redirect()->back()
                ->with('error', 'Failed to save survey. Please try again.')
                ->withInput();
        }
    }

    public function create()
    {
        // give me all the category which related to the question
        $categories = SurveyQuestionCategory::with('questions')->get();
        return view('survey.create', compact('categories'));
    }

    public function evaluation()
    {
        // Get the business profile
        $businessProfile = SurveyBusinessProfile::findOrFail(1);

        // Fetch survey responses for this business
        $responses = SurveyEvaluation::where('business_profile_id', 1)
            ->with(['question', 'businessProfile'])
            ->get();

        // Send data to the view
        return view('survey.evaluation', compact('businessProfile', 'responses'));
    }

    public function evaluateSurvey($businessId)
    {
        $businessProfile = SurveyBusinessProfile::findOrFail($businessId);

        $responses = SurveyEvaluation::where('business_profile_id', $businessId)
            ->with(['question.category'])
            ->get();

        $evaluationData = [];
        $totalScore = 0;
        $maxScore = $responses->count() * 4;

        // Step 1: Collect evaluation data
        foreach ($responses as $response) {
            $question = $response->question;
            $responseText = $response->response ?? 'No Response';

            [$score, $serviceType] = $this->getScoreAndServiceType($question, $responseText);
            $status = $this->calculateStatus($score);

            $evaluationData[] = [
                "question" => $question->text ?? "Unknown Question",
                "response" => $responseText,
                "category" => $question->category->name ?? 'Uncategorized',
                "standard" => $serviceType,
                "status" => $status,
                "score" => $score
            ];

            $totalScore += $score;
        }

        // Step 2: Group by category
        $categoryData = [];
        foreach ($evaluationData as $data) {
            $category = $data['category'];

            if (!isset($categoryData[$category])) {
                $categoryData[$category] = [
                    'totalScore' => 0,
                    'maxScore' => 0,
                    'statuses' => [],
                    'count' => 0
                ];
            }

            $categoryData[$category]['totalScore'] += $data['score'];
            $categoryData[$category]['maxScore'] += 4; // Each question has a max score of 4
            $categoryData[$category]['statuses'][] = $data['status'];
            $categoryData[$category]['count'] += 1;
        }

        // Step 3: Calculate percentages and determine dominant status per category
        foreach ($categoryData as $category => &$data) {
            $data['percentage'] = ($data['maxScore'] > 0)
                ? number_format(($data['totalScore'] / $data['maxScore']) * 100, 2)
                : 0;

            // Calculate average score to determine dominant status
            $avgScore = $data['totalScore'] / $data['count'];
            $data['status'] = $this->calculateStatus($avgScore);
        }

        $complianceBreakdown = $this->groupComplianceData($evaluationData);
        $compliancePercentage = $this->calculateCompliancePercentage($totalScore, $maxScore);

        return view('survey.evaluation', compact(
            'businessProfile',
            'evaluationData',
            'complianceBreakdown',
            'totalScore',
            'compliancePercentage',
            'categoryData'
        ));
    }

    private function getScoreAndServiceType($question, $responseText)
    {
        $options = json_decode($question->options, true);
        $selectedOption = collect($options)->firstWhere('text', $responseText);

        $score = $selectedOption['score'] ?? 0;
        $serviceType = $selectedOption['service_type'] ?? 'N/A';

        return [$score, $serviceType];
    }

    private function calculateStatus($score)
    {
        if ($score >= 4.0) {
            return "✅ Compliant";
        } elseif ($score >= 2.0) {
            return "⚠️ Partially Compliant";
        } else {
            return "❌ Non-Compliant";
        }
    }

    private function groupComplianceData($evaluationData)
    {
        $grouped = [];

        foreach ($evaluationData as $data) {
            $standard = $data['standard'];

            if (!isset($grouped[$standard])) {
                $grouped[$standard] = [
                    'name' => $standard,
                    'totalScore' => 0,
                    'maxScore' => 0
                ];
            }

            $grouped[$standard]['totalScore'] += $data['score'];
            $grouped[$standard]['maxScore'] += 4;
        }

        foreach ($grouped as &$breakdown) {
            $breakdown['percentage'] = ($breakdown['maxScore'] > 0)
                ? number_format(($breakdown['totalScore'] / $breakdown['maxScore']) * 100, 2)
                : 0;
        }

        return array_values($grouped);
    }

    private function calculateCompliancePercentage($totalScore, $maxScore)
    {
        return $maxScore > 0 ? number_format(($totalScore / $maxScore) * 100, 2) : 0;
    }


    public function generateAuditReport($businessId)
    {
        $businessProfile = SurveyBusinessProfile::findOrFail($businessId);

        $responses = SurveyEvaluation::where('business_profile_id', $businessId)
            ->with(['question.category', 'businessProfile'])
            ->get();

        if ($responses->isEmpty()) {
            return redirect()->back()->with('error', 'No evaluations found for this business.');

        }

        // Compliance mapping
        $complianceRules = [
            "We don’t use data analysis" => [
                "standard" => "CMMI DEV (Process Optimization)", "status" => "Non-Compliant", "score" => 0
            ],
            "OKRs are used with full transparency" => [
                "standard" => "ISO 9001 (Quality & Objectives)", "status" => "Compliant", "score" => 2
            ],
            "We use data sometimes" => [
                "standard" => "CMMI DEV (Process Optimization)", "status" => "Partially Compliant", "score" => 1
            ],
            "No data sharing" => ["standard" => "ISO 9001 (Data Control)", "status" => "Non-Compliant", "score" => 0],
            "Some processes are scalable outside the organization (e.g., franchises)" => [
                "standard" => "ISO 9001 (Scalability)", "status" => "Compliant", "score" => 2
            ],
            "Traditional metrics (e.g., sales, profit)" => [
                "standard" => "ISO 9001 (Performance Tracking)", "status" => "Partially Compliant", "score" => 1
            ],
            "Risk-taking and failure are embraced and celebrated" => [
                "standard" => "ISO 9001 (Continuous Improvement)", "status" => "Compliant", "score" => 2
            ],
            "Decentralized decisions in customer-facing areas" => [
                "standard" => "CMMI SVC (Service Delivery)", "status" => "Partially Compliant", "score" => 1
            ],
            "Some teams use social tools (e.g., Slack, Teams)" => [
                "standard" => "ISO 9001 (Communication)", "status" => "Partially Compliant", "score" => 1
            ],
        ];

        $evaluationData = [];
        $totalScore = 0;
        $maxScore = count($responses) * 2;

        foreach ($responses as $response) {
            $questionText = $response->question->text ?? "Unknown Question";
            $responseText = $response->response ?? "No response";
            $categoryName = $response->question->category->name ?? 'Uncategorized';

            $complianceData = $complianceRules[$responseText] ?? [
                "standard" => "N/A", "status" => "Partially Compliant", "score" => 1
            ];

            $totalScore += $complianceData['score'];

            $evaluationData[] = [
                "question" => $questionText,
                "response" => $responseText,
                "category" => $categoryName,
                "standard" => $complianceData["standard"],
                "status" => $complianceData["status"],
                "score" => $complianceData["score"]
            ];
        }

        // Compliance Breakdown
        $complianceBreakdown = [];
        foreach ($evaluationData as $data) {
            $standard = $data['standard'];

            if (!isset($complianceBreakdown[$standard])) {
                $complianceBreakdown[$standard] = [
                    'name' => $standard,
                    'totalScore' => 0,
                    'maxScore' => 0
                ];
            }

            $complianceBreakdown[$standard]['totalScore'] += $data['score'];
            $complianceBreakdown[$standard]['maxScore'] += 2;
        }

        foreach ($complianceBreakdown as $key => $breakdown) {
            $complianceBreakdown[$key]['percentage'] = $breakdown['maxScore'] > 0
                ? number_format(($breakdown['totalScore'] / $breakdown['maxScore']) * 100, 2)
                : 0;
        }

        $evaluationResults = [
            'totalScore' => $totalScore,
            'compliancePercentage' => $maxScore > 0 ? ($totalScore / $maxScore) * 100 : 0,
            'evaluationData' => collect($evaluationData),
            'complianceBreakdown' => array_values($complianceBreakdown),
        ];


        // Generate and store PDF
        $reportType = $this->getReportType($businessId);
        $fileName = "{$reportType}_report_{$businessId}.pdf";
        $relativePath = "reports/{$fileName}";

        $pdf = PDF::loadView('report.survey-report', compact('businessProfile', 'responses', 'evaluationResults'));
        Storage::put($relativePath, $pdf->output());

        $report = AuditReport::updateOrCreate(
            ['business_profile_id' => $businessId, 'type' => $reportType],
            ['file_path' => $relativePath, 'status' => 'pending']
        );

        return redirect()->back()->with('success', 'Survey report generated successfully!');
    }


    private function getReportType($businessId)
    {
        $existingReports = AuditReport::where('business_profile_id', $businessId)->pluck('type')->toArray();

        if (!in_array('preliminary', $existingReports)) {
            return 'preliminary';
        } elseif (!in_array('final', $existingReports)) {
            return 'final';
        } else {
            return 'executive_summary';
        }
    }


    public function showSurveyReports($businessId)
    {
        $reports = AuditReport::with('businessProfile')->where('business_profile_id', $businessId)->get();
        return view('report.index', compact('businessId', 'reports'));
    }


    public function downloadSurveyReport($businessId)
    {
        try {

            $report = AuditReport::where('business_profile_id', $businessId)->first();

            if (!$report) {
                return redirect()->back()->with('error', 'Report not found for this business.');
            }

            $filePath = $report->file_path;

//            if (!Storage::disk('local')->exists("/private/{$filePath}")) {
//                return redirect()->back()->with('error', 'Report file does not exist on the server.');
//            }
//

            return response()->download(
                storage_path("app/private/{$filePath}"),
                basename($filePath)
            );

        } catch (Exception $e) {
            Log::error("Download error for business ID {$businessId}: ".$e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred while downloading the report.');
        }
    }


}
