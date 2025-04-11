<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Survey Responses') }}
            </h2>
        </div>
    </x-slot>

    <div class="col-12 mb-4">

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
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                            <i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#surveyModal{{ $survey->id }}">
                                                <i
                                                    class="icon-base bx bx bx-detail me-1"></i> Details
                                            </button>
                                             <a class="dropdown-item" href="{{ route('survey.business.evaluation', ['businessId' => $survey->id]) }}">
    <i class="icon-base bx bx-check-square me-1"></i> Evaluate
</a>

                                        </div>
                                    </div>

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
