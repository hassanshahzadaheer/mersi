<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mersi Solution') }}</title>

    <!-- CSS Files -->
    @vite([
        'resources/assets/vendor/css/core.css',
        'resources/assets/vendor/css/theme-default.css',
        'resources/assets/css/demo.css',
        'resources/assets/vendor/fonts/boxicons.css',
        'resources/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
        'resources/assets/vendor/libs/apex-charts/apex-charts.css'
    ])

    <!-- Main JS File (includes all required imports) -->
    @vite('resources/js/app.js')

</head>
<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!--  menu -->
        @include('layouts.navigation')
        <!--  end menu -->

        <div class="layout-page">
            <!-- top nav bar -->
            @include('layouts.header-nav')
            <!-- end top nav bar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">
                    <div class="row">
                        <!-- Content -->
                        @isset($header)
                            <header>
                                <span class="text-muted fw-light">
                                    {{ $header }}
                                </span>
                            </header>
                        @endisset

                        {{ $slot }}

                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
</body>
</html>
