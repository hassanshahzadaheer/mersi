<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Survey Report') }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Audit Reports</h2>
            <div class="flex space-x-2">
                <input type="date" id="start_date" class="border p-2 rounded" placeholder="Start Date">
                <input type="date" id="end_date" class="border p-2 rounded" placeholder="End Date">
                <button id="filterBtn" class="bg-blue-500 text-black px-4 py-2 rounded">Filter</button>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-lg shadow">
                <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-2 px-4 text-left">ID</th>
                    <th class="py-2 px-4 text-left">Company</th>
                    <th class="py-2 px-4 text-left">Industry</th>
                    <th class="py-2 px-4 text-left">Type</th>
                    <th class="py-2 px-4 text-left">Status</th>
                    <th class="py-2 px-4 text-left">Created At</th>
                    <th class="py-2 px-4 text-left">Actions</th>
                </tr>
                </thead>
                <tbody id="reportTable">
                @foreach($reports as $report)
                    <tr class="border-b">
                        <td class="py-2 px-4">{{ $report->id }}</td>
                        <td class="py-2 px-4">{{ $report->businessProfile->company_name ?? 'N/A' }}</td>
                        <td class="py-2 px-4">{{ $report->businessProfile->company_industry ?? 'N/A' }}</td>
                        <td class="py-2 px-4">{{ ucfirst($report->type) }}</td>
                        <td class="py-2 px-4">{{ ucfirst($report->status) }}</td>
                        <td class="py-2 px-4">{{ $report->created_at->format('Y-m-d') }}</td>
                        <td class="py-2 px-4">
                            <a href="{{ route('survey.audit.view', ['businessId' => $report->business_profile_id]) }}"
                               class="text-blue-600">View</a>
                            <a href="{{ route('survey.report.download', ['businessId' => $report->business_profile_id]) }}"
                               class="bg-blue-500 text-white px-4 py-2 rounded">
                                Download PDF
                            </a>

                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('filterBtn').addEventListener('click', function () {
            let startDate = document.getElementById('start_date').value;
            let endDate = document.getElementById('end_date').value;
            let rows = document.querySelectorAll('#reportTable tr');

            rows.forEach(row => {
                let date = row.children[4].textContent;
                if ((startDate && date < startDate) || (endDate && date > endDate)) {
                    row.style.display = 'none';
                } else {
                    row.style.display = '';
                }
            });
        });
    </script>
</x-app-layout>
