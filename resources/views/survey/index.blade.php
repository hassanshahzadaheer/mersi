<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="d-flex justify-content-between align-items-center px-3 mb-4">
                <div>
                    <h2 class="h2 fw-bold text-dark m-0">
                        Business Intake Survey Responses
                    </h2>
                    <p class="text-muted small mt-1 mb-0">
                        View and manage all survey responses submitted by your organization
                    </p>
                </div>

                <!-- Right: Back to Dashboard Button -->
                <div>
                    <a href="{{ route('survey.create') }}"
                       class="btn btn-primary btn-sm">
                        ️Create New Survey
                    </a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="col-12 mb-4">
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

        <div class="card">
            <div class="card-body justify-content-between align-items-center">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">Company</th>
                            <th class="px-4 py-2">Industry</th>
                            <th class="px-4 py-2">Website</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                        @if($surveys->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500 dark:text-gray-400">
                                    No survey responses found.
                                </td>
                            </tr>
                        @else
                            @foreach($surveys as $survey)
                                <tr class="border-b border-gray-300 dark:border-gray-700">
                                    <td class="px-4 py-3 font-semibold text-gray-800 dark:text-gray-200">
                                        {{ $survey->company_name }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-700 dark:text-gray-300">
                                        {{ $survey->company_industry }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="{{ $survey->company_website }}" target="_blank"
                                           class="text-blue-600 hover:underline">
                                            {{ $survey->company_website }}
                                        </a>
                                    </td>

                                    <td class="px-4 py-3">
                                        <button type="button"
                                                class="btn btn-sm btn-icon rounded-pill btn-outline-primary me-2"
                                                title="View Details"
                                                data-bs-toggle="modal"
                                                data-bs-target="#surveyModal{{ $survey->id }}">
                                            <span class="tf-icons bx bx-show bx-18px"></span>
                                        </button>
                                        <a type="button" class="btn btn-sm btn-icon rounded-pill btn-outline-dark me-2"
                                           href="{{ route('survey.business.evaluation', ['businessId' => $survey->id]) }}"
                                           data-bs-toggle="tooltip" data-bs-placement="top" title="Open Evaluation">
                                            <span class="tf-icons bx bx-analyse bx-18px"></span>
                                        </a>
                                        <a href="{{ route('survey.audit.generate', $survey->id) }}"
                                           class="btn btn-sm btn-icon rounded-pill btn-outline-secondary"
                                           data-bs-toggle="tooltip"
                                           data-bs-placement="top"
                                           title="Generate Report">
                                            <span class="tf-icons bx bx-file bx-18px"></span>
                                        </a>


                                    </td>


                                </tr>

                                <!-- Bootstrap Modal (Hidden by Default) -->
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

                                                    <strong> {{ $evaluation->question->text }}: </strong>

                                                    <p class="text-gray-600 dark:text-gray-400 mb-3">
                                                        {{ $evaluation->response }}
                                                    </p>
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

    </div>


    <!-- pagination  -->
    <div class="py-6">
        <div class="d-flex justify-content-end ">
            <nav aria-label="pagination">
                <ul class="pagination">
                    <li class="dt-paging-button page-item {{ $surveys->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link previous" href="{{ $surveys->previousPageUrl() }}"
                           aria-label="Previous">
                            <i class="icon-base bx bx-chevron-left scaleX-n1-rtl icon-sm"></i>
                        </a>
                    </li>

                    @for ($i = 1; $i <= $surveys->lastPage(); $i++)
                        <li class="dt-paging-button page-item {{ $surveys->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $surveys->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    <li class="dt-paging-button page-item {{ $surveys->hasMorePages() ? '' : 'disabled' }}">
                        <a class="page-link next" href="{{ $surveys->nextPageUrl() }}" aria-label="Next">
                            <i class="icon-base bx bx-chevron-right scaleX-n1-rtl icon-sm"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
</x-app-layout>
