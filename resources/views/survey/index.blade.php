<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="d-flex justify-content-between align-items-center px-3 mb-4 w-100">
                <div>
                    <h2 class="h2 fw-bold text-dark m-0">
                        Business Intake Survey Responses
                    </h2>
                    <p class="text-muted small mt-1 mb-0">
                        View and manage all survey responses submitted by your organization
                    </p>
                </div>
                <div>
                    <a href="{{ route('survey.create') }}" class="btn btn-primary btn-sm">
                        ➕ Create New Survey
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container-fluid mb-4">

        <!-- Alerts -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>There were some problems:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Card and Table -->
        <div class="card">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                        <tr>
                            <th>Company</th>
                            <th>Industry</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($surveys->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    No survey responses found.
                                </td>
                            </tr>
                        @else
                            @foreach($surveys as $survey)
                                <tr>
                                    <td>{{ $survey->company_name }}</td>
                                    <td>{{ $survey->company_industry }}</td>
                                    <td>
                                        <a href="{{ $survey->company_website }}" target="_blank"
                                           class="text-primary text-decoration-underline">
                                            {{ $survey->company_website }}
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button"
                                                class="btn btn-outline-primary btn-sm rounded-pill me-2"
                                                title="View Details"
                                                data-bs-toggle="modal"
                                                data-bs-target="#surveyModal{{ $survey->id }}">
                                            <i class="bx bx-show"></i>
                                        </button>

                                        <a href="{{ route('survey.business.evaluation', ['businessId' => $survey->id]) }}"
                                           class="btn btn-outline-dark btn-sm rounded-pill me-2"
                                           title="Open Evaluation">
                                            <i class="bx bx-analyse"></i>
                                        </a>

                                        <a href="{{ route('survey.audit.generate', $survey->id) }}"
                                           class="btn btn-outline-secondary btn-sm rounded-pill"
                                           title="Generate Report">
                                            <i class="bx bx-file"></i>
                                        </a>
                                    </td>
                                </tr>

                                <!-- Survey Modal -->
                                <div class="modal fade" id="surveyModal{{ $survey->id }}" tabindex="-1"
                                     aria-labelledby="surveyModalLabel{{ $survey->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="surveyModalLabel{{ $survey->id }}">
                                                    Survey Details - {{ $survey->company_name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @foreach($survey->evaluations as $evaluation)
                                                    <div class="mb-3">
                                                        <strong>{{ $evaluation->question->text }}:</strong>
                                                        <p class="text-muted">{{ $evaluation->response }}</p>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-4">
            {{ $surveys->links('pagination::bootstrap-5') }}
        </div>

    </div>
</x-app-layout>
