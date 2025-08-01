<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="d-flex justify-content-between align-items-center px-3 mb-4">
                <div>
                    <h2 class="h2 fw-bold text-dark m-0">
                        Business Intake Survey
                    </h2>
                    <p class="text-muted small mt-1 mb-0">
                        Complete this assessment to help us understand your organization better.
                    </p>
                </div>
                <div>
                    <a href="{{ route('survey.index') }}" class="btn btn-primary btn-sm">
                        Back to Survey List
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('survey.store') }}" method="POST" class="mt-2">
        @csrf

        {{-- Progress Bar and Step Info --}}
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span id="section-info" class="fw-bold text-dark">Section 1 of {{ 1 + $categories->count() }}</span>
                <span id="percentage" class="text-muted small">0%</span>
            </div>
            <div class="progress" style="height: 8px;">
                <div id="progress-bar" class="progress-bar bg-primary" role="progressbar" style="width: 0%;"></div>
            </div>
        </div>

        <div id="step-container">
            {{-- Step 1: General Information --}}
            <div class="step">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-3">General Information</h5>
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control"
                                       placeholder="Enter your company name" required>
                                @error('company_name')
                                <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Contact Person</label>
                                <input type="text" name="contact_person" class="form-control"
                                       placeholder="Enter contact person's name" required>
                                @error('contact_person')
                                <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Company Website</label>
                                <input type="text" name="company_website" class="form-control"
                                       placeholder="Enter company website" required>
                                @error('company_website')
                                <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Company Industry</label>
                                <input type="text" name="company_industry" class="form-control"
                                       placeholder="Enter industry type" required>
                                @error('company_industry')
                                <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Service Request Type</label>
                                <select name="service_request_type" class="form-select" required>
                                    <option value="">Select service request type</option>
                                    <option>Process/Operations Optimization</option>
                                    <option>Quality Assurance & Compliance</option>
                                    <option>Project Management Excellence</option>
                                    <option>CMMI for Service (SVC)</option>
                                    <option>CMMI for Development (DEV)</option>
                                    <option>ISO 9001: 2015 Quality Management System</option>
                                    <option>ISO 27001 Information Security Management System</option>
                                    <option>ISO 20000-1 IT Service Management System</option>
                                    <option>ISO 45001 Occupational Health and Safety</option>
                                    <option>Other</option>
                                </select>
                                @error('service_request_type')
                                <div class="text-danger small">{{ $message }}</div> @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Steps 2+: Categories --}}
            @foreach($categories as $category)
                <div class="step d-none">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">{{ $loop->iteration }} - {{ $category->name }}</h5>
                            <div class="row g-3">

                                @foreach($category->questions as $question)
                                    <div class="col-md-12">
                                        <label class="form-label">{{ $question->text }}</label>

                                        @if($question->options)
                                            @foreach(json_decode($question->options) as $option)
                                                @if(is_object($option) && isset($option->text))
                                                    <div class="form-check">
                                                        <input
                                                            type="radio"
                                                            class="form-check-input"
                                                            name="questions[{{ $question->id }}]"
                                                            id="q{{ $question->id }}_{{ $loop->index }}"
                                                            value='@json(["text" => $option->text, "score" => $option->score])'
                                                            required
                                                        >
                                                        <label class="form-check-label"
                                                               for="q{{ $question->id }}_{{ $loop->index }}">
                                                            {{ $option->text }}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <textarea name="questions[{{ $question->id }}]" class="form-control"
                                                      rows="3" placeholder="Type your answer here..."
                                                      required></textarea>
                                        @endif
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Navigation Buttons --}}
        <div class="d-flex justify-content-between mt-4">
            <button type="button" id="prevBtn" class="btn btn-secondary d-none">
                Previous
            </button>

            <div class="ms-auto">
                <button type="button" id="nextBtn" class="btn btn-primary">
                    Next
                </button>

                <button type="submit" id="submitBtn" class="btn btn-success d-none">
                    Submit
                </button>
            </div>
        </div>
    </form>

    {{-- Stepper Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.step');
            const nextBtn = document.getElementById('nextBtn');
            const prevBtn = document.getElementById('prevBtn');
            const submitBtn = document.getElementById('submitBtn');
            const progressBar = document.getElementById('progress-bar');
            const sectionInfo = document.getElementById('section-info');
            const percentage = document.getElementById('percentage');
            const totalSteps = steps.length;
            let currentStep = 0;

            function updateProgress() {
                const progressPercent = Math.round((currentStep + 1) / totalSteps * 100);
                progressBar.style.width = progressPercent + '%';
                sectionInfo.textContent = `Section ${currentStep + 1} of ${totalSteps}`;
                percentage.textContent = `${progressPercent}%`;
            }

            function showStep(index) {
                steps.forEach((step, i) => {
                    step.classList.toggle('d-none', i !== index);
                });

                prevBtn.classList.toggle('d-none', index === 0);
                nextBtn.classList.toggle('d-none', index === steps.length - 1);
                submitBtn.classList.toggle('d-none', index !== steps.length - 1);

                updateProgress();
            }

            nextBtn.addEventListener('click', function () {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            prevBtn.addEventListener('click', function () {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            showStep(currentStep); // Initialize on load
        });
    </script>
</x-app-layout>
