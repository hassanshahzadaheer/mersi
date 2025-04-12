<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Payment Successful') }}
        </h2>
    </x-slot>

    <div class="container text-center py-5">
        <h1 class="text-success">🎉 Payment Successful!</h1>
        <p class="lead mt-3">Thank you for subscribing. Your plan has been activated.</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4">Go to Dashboard</a>
    </div>
</x-app-layout>

