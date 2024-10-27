@php use Carbon\Carbon; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Payments') }}
        </h2>
    </x-slot>
    <div class="card">
        <h5 class="card-header">Subscription Plans</h5>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Plan</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Expires On</th>
                    <th>Renewal Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @foreach ($subscriptions as $subscription)
                    <tr>
                        <td><strong>{{ $subscription->plan_name }}</strong></td>
                        <td>${{ number_format($subscription->price, 2) }}</td>
                        <td>
                            @if ($subscription->status === 'active')
                                <span class="badge bg-label-primary me-1">Active</span>
                            @elseif ($subscription->status === 'expired')
                                <span class="badge bg-label-danger me-1">Expired</span>
                            @elseif ($subscription->status === 'canceled')
                                <span class="badge bg-label-warning me-1">Canceled</span>
                            @endif
                        </td>
                        <td>{{ Carbon::parse($subscription->expire_date)->format('Y-m-d') }}</td>
                        <td>{{ Carbon::parse($subscription->renewal_date)->format('Y-m-d') }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                    </a>
                                    <a class="dropdown-item"
                                       href="#">
                                        <i class="bx bx-trash me-1"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
