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
use Illuminate\Support\Facades\Storage;
use Log;

class Survey extends Controller
{
    public function index()
    {
        $surveys = SurveyBusinessProfile::with(['evaluations.question.category'])
            ->latest()
            ->paginate(5);

        return view('survey.index', compact('surveys'));
    }

    public function store(Request $request)
    {
        try {
            Log::info('Incoming request:', $request->all());

            DB::beginTransaction();

            // Validate general information
            $validated = $request->validate([
                'company_name' => 'required',
                'contact_person' => 'required',
                'company_website' => 'required',
                'company_industry' => 'required',
                'service_request' => 'required|in:operations-optimization,project-management,ISO-9001-2015,CMMI-for-service,CMMI-for-development,other',
                'questions' => 'required|array'
            ]);

            Log::info('Validated Data:', $validated);

            // Create business profile
            Log::info('Attempting to create business profile', ['data' => $validated]);

            $businessProfile = SurveyBusinessProfile::create([
                'company_name' => $validated['company_name'],
                'contact_person' => $validated['contact_person'],
                'company_website' => $validated['company_website'],
                'company_industry' => $validated['company_industry'],
                'service_request' => $validated['service_request'],
            ]);

            Log::info('Business profile created successfully', ['id' => $businessProfile->id]);

            // Store survey responses
            foreach ($request->questions as $questionId => $response) {
                Log::info('Processing response', ['question_id' => $questionId, 'response' => $response]);

                $evaluation = SurveyEvaluation::create([
                    'business_profile_id' => $businessProfile->id,
                    'question_id' => $questionId,
                    'response' => $response,
                ]);

                Log::info('Response saved', ['evaluation_id' => $evaluation->id]);
            }

            DB::commit();
            Log::info('Survey saved successfully!');

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
        // Try to find the business profile
        $businessProfile = SurveyBusinessProfile::find($businessId);

        // Check if business profile exists
        if (!$businessProfile) {
            return response()->json(['error' => 'Business profile not found'], 404);
        }

        // Fetch survey responses with related question and category
        $responses = SurveyEvaluation::where('business_profile_id', $businessId)
            ->with(['question.category', 'businessProfile'])
            ->get();

        // Initialize scoring
        $totalScore = 0;
        $maxScore = count($responses) * 2; // Max possible score if all answers are compliant
        $evaluationData = [];

        // Compliance mapping for each response
        $complianceRules = [
            "We don’t use data analysis" => [
                "standard" => "CMMI DEV (Process Optimization)", "status" => "❌ Non-Compliant", "score" => 0
            ],
            "OKRs are used with full transparency" => [
                "standard" => "ISO 9001 (Quality & Objectives)", "status" => "✅ Compliant", "score" => 2
            ],
            "We use data sometimes" => [
                "standard" => "CMMI DEV (Process Optimization)", "status" => "⚠️ Partially Compliant", "score" => 1
            ],
            "No data sharing" => ["standard" => "ISO 9001 (Data Control)", "status" => "❌ Non-Compliant", "score" => 0],
            "Some processes are scalable outside the organization (e.g., franchises)" => [
                "standard" => "ISO 9001 (Scalability)", "status" => "✅ Compliant", "score" => 2
            ],
            "Traditional metrics (e.g., sales, profit)" => [
                "standard" => "ISO 9001 (Performance Tracking)", "status" => "⚠️ Partially Compliant", "score" => 1
            ],
            "Risk-taking and failure are embraced and celebrated" => [
                "standard" => "ISO 9001 (Continuous Improvement)", "status" => "✅ Compliant", "score" => 2
            ],
            "Decentralized decisions in customer-facing areas" => [
                "standard" => "CMMI SVC (Service Delivery)", "status" => "⚠️ Partially Compliant", "score" => 1
            ],
            "Some teams use social tools (e.g., Slack, Teams)" => [
                "standard" => "ISO 9001 (Communication)", "status" => "⚠️ Partially Compliant", "score" => 1
            ],
        ];

        // Process responses dynamically
        foreach ($responses as $response) {
            $questionText = $response->question->text ?? "Unknown Question";
            $responseText = $response->response ?? "No response";
            $categoryName = $response->question->category->name ?? 'Uncategorized';

            // Default compliance if no mapping exists
            $complianceData = $complianceRules[$responseText] ?? [
                "standard" => "N/A",
                "status" => "⚠️ Partially Compliant",
                "score" => 1
            ];

            // Add to total score
            $totalScore += $complianceData["score"];

            // Store structured data for the Blade view
            $evaluationData[] = [
                "question" => $questionText,
                "response" => $responseText,
                "category" => $categoryName,
                "standard" => $complianceData["standard"],
                "status" => $complianceData["status"],
                "score" => $complianceData["score"]
            ];
        }

        // Group compliance scores by standard
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
            $complianceBreakdown[$standard]['maxScore'] += 2; // Each question max score is 2
        }

// Convert breakdown to percentages
        foreach ($complianceBreakdown as $key => $breakdown) {
            $complianceBreakdown[$key]['percentage'] = ($breakdown['maxScore'] > 0)
                ? number_format(($breakdown['totalScore'] / $breakdown['maxScore']) * 100, 2)
                : 0;
        }

// Convert associative array to indexed array for Blade compatibility
        $complianceBreakdown = array_values($complianceBreakdown);

        // Calculate overall compliance percentage
        $compliancePercentage = $maxScore > 0 ? ($totalScore / $maxScore) * 100 : 0;

        // Return view with data
        return view('survey.evaluation',
            compact('businessProfile', 'evaluationData', 'totalScore', 'compliancePercentage'));
    }


    public function generateAuditReport($businessId)
    {
        $businessProfile = SurveyBusinessProfile::findOrFail($businessId);

        $responses = SurveyEvaluation::where('business_profile_id', $businessId)
            ->with(['question.category', 'businessProfile'])
            ->get();

        if ($responses->isEmpty()) {
            return response()->json(['message' => 'No evaluations found for this business.'], 404);
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

        return response()->json([
            'message' => 'Audit report generated successfully!',
            'report' => $report
        ]);
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


    public function viewAuditReport($businessId)
    {
        $reports = AuditReport::with('businessProfile')->where('business_profile_id', $businessId)->get();
        return view('report.index', compact('businessId', 'reports'));
    }

    public function downloadSurveyReport($businessId)
    {
        $report = AuditReport::where('business_profile_id', $businessId)->firstOrFail();
        return response()->file(public_path($report->file_path));
    }


}
