<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Survey') }}
        </h2>
    </x-slot>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('survey.store')  }}" method="POST">
        @csrf

        <!-- General information -->
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <!-- General Information Section -->
                    <div class="row gy-3 mt-0">

                        <div class="col-12">
                            <h6>{{ __('General Information') }}</h6>
                            <hr class="mt-0">
                        </div>

                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="company_name">{{ __('Company Name') }}</label>
                            <input id="company_name" name="company_name" type="text" class="form-control"
                                   placeholder="Enter company name" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('company_name'){{ $message }}@enderror</small>
                        </div>


                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="contact_person">{{ __('Contact Person') }}</label>
                            <input id="contact_person" name="contact_person" type="text" class="form-control"
                                   placeholder="Enter contact person's name" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('contact_person'){{ $message }}@enderror</small>
                        </div>

                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="company_website">{{ __('Company Website') }}</label>
                            <input id="company_website" name="company_website" type="text" class="form-control"
                                   placeholder="https://example.com" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('company_website'){{ $message }}@enderror</small>
                        </div>

                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="company_industry">{{ __('Company Industry') }}</label>
                            <input id="company_industry" name="company_industry" type="text" class="form-control"
                                   placeholder="Enter industry type (e.g., IT, Healthcare)" required/>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('company_industry'){{ $message }}@enderror</small>
                        </div>

                        <div class="col-md-4 fv-plugins-icon-container">
                            <label class="form-label" for="service_request">{{ __('Service Request Type') }}</label>
                            <select id="service_request" name="service_request" class="form-control" required>
                                <option value="">{{ __('Select service request type') }}</option>
                                <option
                                    value="operations-optimization">{{ __(' Process/Operations Optimization') }}</option>
                                <option value="project-management">{{ __('Project Management') }}</option>
                                <option value="ISO-9001-2015">{{ __('ISO 9001: 2015') }}</option>
                                <option value="CMMI-for-service">{{ __('CMMI for Service (SVC)') }}</option>
                                <option value="CMMI-for-development">{{ __('CMMI for Development (DEV)') }}</option>
                                <option value="other">{{ __('Other') }}</option>
                            </select>
                            <small
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">@error('service_request'){{ $message }}@enderror</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Survey questions section -->
        <div class="col-12 mb-4">
            <div class="card overflow-auto" style="max-height: 500px;">
                <!-- Questions -->
                 <div class="card-body">
                       <div class="col-12">
                              <h6>{{ __('Business Intake Evaluation') }}</h6>
                            <hr class="mt-0">
                        </div>

<div class="row gy-3 mt-0">
                    @foreach($categories as $category)
                        <!-- Category Header -->
                        <div class="col-12">
                            <h6><strong>{{ $loop->iteration }} - {{ $category->name }}</strong></h6>
                        </div>

                        <!-- Questions for this category -->
                        @foreach($category->questions as $question)
                            <div class="col-md-6 mt-0">
                                <label class="form-label">{{ $question->text }}</label>

                                @if($question->options)
                                    @foreach(json_decode($question->options) as $option)
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                type="radio"
                                                name="questions[{{ $question->id }}]"
                                                value="{{ $option }}"
                                                id="q{{ $question->id }}_{{ $loop->index }}"
                                                required>
                                            <label class="form-check-label"
                                                for="q{{ $question->id }}_{{ $loop->index }}">
                                                {{ $option }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <textarea class="form-control"
                                            name="questions[{{ $question->id }}]"
                                            rows="3"
                                            required></textarea>
                                @endif
                            </div>
                        @endforeach
                    @endforeach
                </div>
                </div>

            </div>
        </div>

        {{-- Action buttons --}}
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <p class="mb-0">You can save your progress to resume later or submit your responses to finalize the survey.</p>
                    <div>
                        <button type="submit" class="btn btn-secondary me-2" name="action" value="save">
                            Save Progress
                        </button>
                        <button type="submit" class="btn btn-primary" name="action" value="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
