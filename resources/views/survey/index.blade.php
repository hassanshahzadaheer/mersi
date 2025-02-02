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
            <div class="card-body d-flex justify-content-between align-items-center">
                Java
            </div>
        </div>
    </div>


    <!-- Survey Table -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full border border-gray-300 dark:border-gray-700 text-sm">
                    <thead class="bg-gray-100 dark:bg-gray-900">
                    <tr class="border-b border-gray-300 dark:border-gray-700 text-left">
                        <th class="px-4 py-2">Company</th>
                        <th class="px-4 py-2">Industry</th>
                        <th class="px-4 py-2">Website</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300 dark:divide-gray-700">
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
                                <!-- Details Button (Opens Modal) -->
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#surveyModal{{ $survey->id }}">
                                    🔍 Details
                                </button>

                                <!-- Edit Button -->
                                <a href=""
                                   class="text-yellow-500 hover:underline ml-2">
                                    ✏ Edit
                                </a>

                                <!-- Delete Button -->
                                <form action="" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline ml-2">
                                        🗑 Delete
                                    </button>
                                </form>
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
                                            <p class="font-bold text-gray-800 dark:text-gray-300">
                                                {{ $evaluation->question->text }}:
                                            </p>
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

            <!-- Custom Pagination -->
            <div class="dt-paging">
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
    </div>
</x-app-layout>
