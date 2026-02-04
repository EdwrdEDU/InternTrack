<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OJT Tracker')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; }
    </style>
</head>
<body class="bg-white text-gray-900">
    <nav class="border-b border-gray-200 bg-white sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="text-lg font-semibold text-gray-900">OJT Tracker</div>
                <div class="flex space-x-1">
                    <a href="{{ route('interns.index') }}" class="px-4 py-2 text-sm font-medium {{ request()->routeIs('interns.*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-600 hover:text-gray-900' }} transition-colors">
                        Masterlist
                    </a>
                    <a href="{{ route('requirements.index') }}" class="px-4 py-2 text-sm font-medium {{ request()->routeIs('requirements.*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-600 hover:text-gray-900' }} transition-colors">
                        Requirements
                    </a>
                    <a href="{{ route('moa.index') }}" class="px-4 py-2 text-sm font-medium {{ request()->routeIs('moa.*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-600 hover:text-gray-900' }} transition-colors">
                        MOA Tracking
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @if(session('success'))
            <div class="fixed bottom-6 right-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm shadow-lg z-50 animate-fade-in" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="fixed bottom-6 right-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm shadow-lg z-50 animate-fade-in" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        // Auto-hide notifications after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('[role="alert"]');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>
