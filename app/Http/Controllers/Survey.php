<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Validation\ValidationException;

class Survey extends Controller
{
    public function index()
    {
        return view('survey.index');
    }

    public function store(Request $request)
    {
        // Log the incoming request data for debugging purposes
        Log::debug('Incoming survey data: ', $request->all());

        try {
            // Validate the request inputs
            $validated = $request->validate([
                'company_name' => 'required|string|max:255',
                'contact_person' => 'required|string|max:255',
                'company_website' => 'required|url|max:255',
                'company_industry' => 'required|string|max:255',
                'service_request' => 'required|in:operations-optimization,project-management,ISO-9001-2015,CMMI-for-service,CMMI-for-development,other',
            ], [
                'company_name.required' => 'The company name field is required.',
                'contact_person.required' => 'The contact person field is required.',
                'company_website.required' => 'The company website field is required.',
                'company_website.url' => 'Please provide a valid URL for the company website.',
                'company_industry.required' => 'The company industry field is required.',
                'service_request.required' => 'Please select a service request type.',
                'service_request.in' => 'The selected service request type is invalid.',
            ]);

            // Log validated data
            Log::info('Survey data validated successfully.', $validated);

            // Store data in the database (example)
            $survey = Survey::create($validated);

            // Log successful storage
            Log::info('Survey data stored successfully.', ['survey_id' => $survey->id]);

            return redirect()->back()->with('success', 'Survey submitted successfully.');

        } catch (ValidationException $e) {
            // Log validation errors
            Log::error('Validation failed.', [
                'errors' => $e->validator->errors()->toArray()
            ]);

            // Re-throw the exception to allow Laravel to handle it (e.g., redirect back with errors)
            throw $e;
        } catch (Exception $e) {
            // Log unexpected exceptions
            Log::critical('Unexpected error occurred while storing survey.', [
                'error_message' => $e->getMessage(),
                'stack_trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    // Handle the form submission to store survey data

    public function create()
    {
        return view('survey.create');
    }
}
