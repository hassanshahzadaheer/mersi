<x-app-layout>
    <x-slot name="header">

        <div class="flex justify-between items-center">
            <div class="d-flex justify-content-between align-items-center px-3 mb-4">
                <div>
                    <h2 class="h2 fw-bold text-dark m-0">
                        {{ __('Subscription Plan') }}
                    </h2>
                    <p class="text-muted small mt-1 mb-0">
                        Select a plan that best fits your organization's needs. All plans include access to our
                        compliance assessment platform.
                    </p>
                </div>

                <div>
                    <a href="{{ route('dashboard') }}"
                       class="btn btn-primary btn-sm">
                        Back to Dashboard
                    </a>
                </div>
            </div>
        </div>

    </x-slot>

    @include('subscription.price-packages',['plans'=>$plans])
</x-app-layout>
