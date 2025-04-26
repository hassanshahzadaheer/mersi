<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h2 fw-bold text-dark m-0">
                    {{ __('Payment Successful') }}
                </h2>
                <p class="text-muted small mt-1 mb-0">
                    Thank you for upgrading — your subscription is now active!
                </p>
            </div>

            <div>
                <a href="{{ route('dashboard') }}" class="btn btn-outline-primary btn-sm">
                    ← Back to Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container text-center py-5">

        <!-- Success Icon -->
        <div class="mb-4">
            <i class="bx bx-check-circle text-success" style="font-size: 6rem;"></i>
        </div>

        <!-- Success Text -->
        <h1 class="fw-bold mb-3 text-success">Payment Successful!</h1>
        <p class="lead text-muted mb-4">
            We're excited to have you onboard. <br> You can now enjoy full access to your plan.
        </p>

        <!-- Button -->
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-lg rounded-pill px-4">
            Go to Dashboard
        </a>

    </div>
</x-app-layout>
