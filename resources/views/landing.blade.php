<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InternTrack</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; }
    </style>
</head>
<body class="bg-white">
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center px-4">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-3xl shadow-2xl mb-6 transform hover:scale-105 transition-transform bg-white">
                <img src="{{ asset('images/FPRDI-Logo.png') }}" alt="FPRDI Logo" class="w-20 h-20 object-contain" />
            </div>
            <h1 class="text-5xl font-light text-gray-900 mb-8">InternTrack</h1>
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('interns.index') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    Student List
                </a>
            </div>
        </div>
    </div>
</body>
</html>
