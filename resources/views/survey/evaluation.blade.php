<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Survey Evaluation for {{ $businessProfile->company_name }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto mt-6">
        <div class="card mb-6">
            <div class="card-body justify-content-between align-items-center">
                <div class="table-responsive text-nowrap">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 flex items-center">
                            Overall Compliance Score:
                            <span
                                class="ml-2 text-blue-600 dark:text-blue-400">{{ number_format($compliancePercentage, 2) }}%</span>
                        </h3>

                        <div class="mt-2 text-gray-700 dark:text-gray-300">
                            <p class="text-lg font-medium">Total Score:
                                <span class="font-bold text-gray-900 dark:text-gray-100">{{ $totalScore }}</span>
                            </p>

                            <p class="mt-1 text-lg">
                                Final Status:
                                @if($compliancePercentage >= 80)
                                    <span class="text-green-600 dark:text-green-400 font-semibold">✅ Compliant</span>
                                @elseif($compliancePercentage >= 50)
                                    <span class="text-yellow-600 dark:text-yellow-400 font-semibold">⚠️ Partially Compliant</span>
                                @else
                                    <span class="text-red-600 dark:text-red-400 font-semibold">❌ Non-Compliant</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-3"></div>

        <div class="card mt-6">
            <div class="card-body justify-content-between align-items-center">
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-left">Category</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                            <th class="py-2 px-4 border-b text-left">Total Score</th>
                        </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                        @php
                            $categoryScores = [];
                            $categoryStatuses = [];

                            // Grouping data by category
                            foreach ($evaluationData as $data) {
                                $category = $data['category'];
                                $score = $data['score'];
                                $status = $data['status'];

                                if (!isset($categoryScores[$category])) {
                                    $categoryScores[$category] = 0;
                                    $categoryStatuses[$category] = [];
                                }

                                $categoryScores[$category] += $score;
                                $categoryStatuses[$category][] = $status;
                            }
                        @endphp

                        @foreach($categoryScores as $category => $score)
                            <tr class="border-b border-gray-300 dark:border-gray-700">
                                <td class="px-4 py-3 font-semibold text-gray-800 dark:text-gray-200">
                                    {{ $category }}
                                </td>
                                <td class="px-4 py-3 text-gray-800 dark:text-gray-200">
                                    {{ implode(', ', array_unique($categoryStatuses[$category])) }}
                                </td>
                                <td class="px-4 py-3 font-bold text-gray-800 dark:text-gray-200">
                                    <strong>  {{ $score }}   </strong>
                                </td>
                            </tr>
                        @endforeach

                        <!-- Overall Score -->
                        <tr class="border-t border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-800">
                            <td class="px-4 py-3 font-bold text-gray-900 dark:text-gray-100">Overall Score</td>
                            <td class="px-4 py-3 text-gray-900 dark:text-gray-100"></td>
                            <!-- Empty cell for alignment -->
                            <td class="px-4 py-3 font-bold text-gray-900 dark:text-gray-100"><strong> {{ $totalScore }}
                                </strong></td>
                        </tr>
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
</x-app-layout>
