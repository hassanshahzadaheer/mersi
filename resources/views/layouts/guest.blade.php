<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- GitHub Buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- CSS Files -->
        @vite([
            'resources/assets/vendor/css/core.css',
            'resources/assets/vendor/css/theme-default.css',
            'resources/assets/css/demo.css',
            'resources/assets/vendor/fonts/boxicons.css',
            'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
            'resources/assets/vendor/libs/apex-charts/apex-charts.css',
            'resources/assets/vendor/css/pages/page-auth.css',
        ])

        <!-- Main JS File (includes all required imports) -->
        @vite('resources/js/app.js')
    </head>


    <body class="font-sans text-gray-900 antialiased">

    <div class="container-xxl min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="/" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <!-- Your SVG logo here -->
                                </span>
                                <span class="app-brand-text demo text-body fw-bolder">MERSI SOLUTION</span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        <!-- Slot for dynamic content -->
                        <div class="mb-2">
                            {{ $slot }}
                        </div>

                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    </body>

</html>
