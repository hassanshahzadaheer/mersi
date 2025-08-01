@php use Carbon\Carbon; @endphp

<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h2 fw-bold text-dark m-0">
                    {{ __('My Subscription') }}

                </h2>
                <p class="text-muted small mt-1 mb-0">
                    Manage your subscription, payment methods and payment history.
                </p>
            </div>

            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm">
                    + Back to Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    {{--    <x-slot name="header">--}}
    {{--        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">--}}
    {{--            {{ __('My Subscription') }}--}}
    {{--        </h2>--}}
    {{--    </x-slot>--}}


    {{-- Current Subscription Section --}}
    <div class="card mb-3">
        <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-between">
            <div>
                <h5 class="card-title mb-2">{{ ucwords( $subscriptions->first()->plan_name ) }}</h5>
                <p class="mb-1 text-muted">Started
                    on {{ Carbon::parse($subscriptions->first()->start_date)->format('M d, Y') }}</p>
                <p class="mb-1 text-muted">Next billing
                    on {{ Carbon::parse($subscriptions->first()->renewal_date)->format('M d, Y') }}</p>
                <span class="badge bg-success mt-2">Active</span>
                <span class="fw-bold ms-2">${{ number_format($subscriptions->first()->price, 2) }}/month</span>
            </div>
            <div class="mt-4 mt-md-0">
                <a href="#" class="btn btn-outline-primary me-2">Update Payment Method</a>
                <a href="#" class="btn btn-outline-danger">Cancel Subscription</a>
            </div>
        </div>
    </div>

    {{-- Subscription History Section --}}
    <div class="card">
        <div class="card-header">
            <h5>Billing History</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                <tr>
                    <th>Invoice ID</th>
                    <th>Plan</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Paid On</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subscriptions as $subscription)
                    <tr>
                        <td>#{{ $subscription->id ?? 'N/A' }}</td>
                        <td> {{ ucwords( $subscriptions->first()->plan_name ) }}  </td>
                        <td>${{ number_format($subscription->price, 2) }}</td>
                        <td>
                            @if ($subscription->status === 'active')
                                <span class="badge bg-success">Paid</span>
                            @elseif ($subscription->status === 'expired')
                                <span class="badge bg-secondary">Expired</span>
                            @elseif ($subscription->status === 'canceled')
                                <span class="badge bg-warning text-dark">Canceled</span>
                            @else
                                <span class="badge bg-danger">Unknown</span>
                            @endif
                        </td>
                        <td>{{ Carbon::parse($subscription->payment_date ?? $subscription->created_at)->format('M d, Y') }}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>

            @if ($subscriptions->isEmpty())
                <div class="text-center py-5">
                    <p class="text-muted">No billing history found.</p>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
