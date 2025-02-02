<?php

namespace App\Http\Controllers;

use App\Models\SurveyBusinessProfile;
use App\Models\SurveyEvaluation;
use App\Models\SurveyQuestionCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Survey extends Controller
{
    public function index()
    {
        $surveys = SurveyBusinessProfile::with(['evaluations.question.category'])
            ->latest()
            ->paginate(2);

        return view('survey.index', compact('surveys'));
    }

    public function store(Request $request)
    {
        try {

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


            // Create business profile
            $businessProfile = SurveyBusinessProfile::create([
                'company_name' => $validated['company_name'],
                'contact_person' => $validated['contact_person'],
                'company_website' => $validated['company_website'],
                'company_industry' => $validated['company_industry'],
                'service_request' => $validated['service_request'],
            ]);

            // Store survey responses
            foreach ($request->questions as $questionId => $response) {
                $evaluation = SurveyEvaluation::create([
                    'business_profile_id' => $businessProfile->id,
                    'question_id' => $questionId,
                    'response' => $response,
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Survey saved successfully!');

        } catch (Exception $e) {
            DB::rollBack();
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
}
