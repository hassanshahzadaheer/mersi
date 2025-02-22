<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Survey Evaluation for {{ $businessProfile->company_name }}
            </h2>
        </div>
    </x-slot>

    <div class="col-12 mb-4">
        <div class="">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Overall Compliance
                Score: {{ number_format($compliancePercentage, 2) }}%</h3>
            <h4 class="text-sm text-gray-500 dark:text-gray-400">Total Score: {{ $totalScore }}</h4>
        </div>

        <div class="mt-6 bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <table class="min-w-full border border-gray-300 dark:border-gray-700 rounded-lg">
                <thead>
                <tr class="bg-gray-200 dark:bg-gray-700">
                    <th class="py-2 px-4 border-b text-left">Question</th>
                    <th class="py-2 px-4 border-b text-left">User Answer</th>
                    <th class="py-2 px-4 border-b text-left">Category</th>
                    <th class="py-2 px-4 border-b text-left">Relevant Standard</th>
                    <th class="py-2 px-4 border-b text-left">Compliance Status</th>
                    <th class="py-2 px-4 border-b text-left">Score</th>
                </tr>
                </thead>
                <tbody>
                @foreach($evaluationData as $data)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $data['question'] }}</td>
                        <td class="py-2 px-4">{{ $data['response'] }}</td>
                        <td class="py-2 px-4">{{ $data['category'] }}</td>
                        <td class="py-2 px-4">{{ $data['standard'] }}</td>
                        <td class="py-2 px-4">
                            @if($data['status'] == '✅ Compliant')
                                <span class="text-green-600">{{ $data['status'] }}</span>
                            @elseif($data['status'] == '⚠️ Partially Compliant')
                                <span class="text-yellow-600">{{ $data['status'] }}</span>
                            @else
                                <span class="text-red-600">{{ $data['status'] }}</span>
                            @endif
                        </td>
                        <td class="py-2 px-4">{{ $data['score'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>
