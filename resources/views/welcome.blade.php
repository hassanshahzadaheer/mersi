<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mersi - We'll Be Back Soon</title>
    <meta name="description"
          content="Mersi is currently undergoing maintenance. We'll be back shortly with exciting updates.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .logo-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #f0f0f0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .pulse-dot {
            animation: pulse 2s infinite;
            box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.7);
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(74, 222, 128, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(74, 222, 128, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(74, 222, 128, 0);
            }
        }

        .float-animation {
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }
            33% {
                transform: translateY(-20px) rotate(1deg);
            }
            66% {
                transform: translateY(10px) rotate(-1deg);
            }
        }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center text-white overflow-hidden relative">
<!-- Animated Background -->
<div class="absolute inset-0 opacity-10 float-animation">
    <div class="absolute top-1/2 left-1/5 w-64 h-64 bg-white rounded-full opacity-20 blur-3xl"></div>
    <div class="absolute top-1/5 right-1/5 w-48 h-48 bg-white rounded-full opacity-15 blur-3xl"></div>
    <div class="absolute bottom-1/5 left-2/5 w-32 h-32 bg-white rounded-full opacity-10 blur-3xl"></div>
</div>

<!-- Main Content -->
<div class="text-center max-w-2xl px-8 relative z-10">
    <!-- Logo -->
    <h1 class="text-6xl md:text-7xl font-bold mb-4 logo-gradient tracking-tight">
        Mersi
    </h1>

    <!-- Subtitle -->
    <h2 class="text-2xl md:text-3xl font-medium mb-8 opacity-95">
        We'll Be Back Soon
    </h2>

    <!-- Status Indicator -->
    <div class="inline-flex items-center glass-effect px-6 py-3 rounded-full mb-8 shadow-xl">
        <div class="w-3 h-3 bg-green-400 rounded-full mr-3 pulse-dot"></div>
        <span class="text-sm font-medium">System Maintenance in Progress</span>
    </div>

    <!-- Main Message -->
    <div class="mb-12 space-y-4">
        <p class="text-lg md:text-xl opacity-90 leading-relaxed font-light">
            We're currently performing scheduled maintenance to improve your experience.
        </p>
        <p class="text-base md:text-lg opacity-80 leading-relaxed font-light">
            Our team is working hard to bring you exciting new features and enhancements. Thank you for your patience.
        </p>
    </div>

    <!-- Contact Section -->
    <div class="glass-effect rounded-2xl p-6 mb-8 shadow-xl">
        <h3 class="text-lg font-semibold mb-3">Need Immediate Assistance?</h3>
        <p class="text-sm opacity-90 mb-2">Our support team is here to help</p>
        <a href="mailto:support@mersi.com"
           class="text-white font-medium hover:opacity-80 transition-opacity duration-300 underline decoration-2 underline-offset-4">
            support@mersi.com
        </a>
    </div>

    <!-- Features Coming Soon -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="glass-effect rounded-xl p-4 text-center">
            <div class="text-2xl mb-2">⚡</div>
            <p class="text-sm font-medium">Enhanced Performance</p>
        </div>
        <div class="glass-effect rounded-xl p-4 text-center">
            <div class="text-2xl mb-2">🎨</div>
            <p class="text-sm font-medium">New User Interface</p>
        </div>
        <div class="glass-effect rounded-xl p-4 text-center">
            <div class="text-2xl mb-2">🔒</div>
            <p class="text-sm font-medium">Advanced Security</p>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-sm opacity-70 font-light">
    <p>&copy; {{ date('Y') }} Mersi. All rights reserved.</p>
</div>
</body>
</html>
