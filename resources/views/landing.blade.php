<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJT Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; }
    </style>
</head>
<body class="bg-white">
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center px-4">
            <h1 class="text-5xl font-light text-gray-900 mb-2">OJT Tracker</h1>
            <p class="text-gray-500 text-lg mb-8">Manage your internship program</p>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('interns.index') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Masterlist
                </a>
                <a href="{{ route('requirements.index') }}" class="px-6 py-2 border border-gray-300 text-gray-900 rounded-lg hover:bg-gray-50 transition-colors">
                    Requirements
                </a>
            </div>
        </div>
    </div>
</body>
</html>
