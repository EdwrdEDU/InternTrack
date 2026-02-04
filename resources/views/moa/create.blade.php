@extends('layouts.app')

@section('title', 'Add MOA Record')

@section('content')
<div class="min-h-screen py-12">
    <div class="max-w-2xl">
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-gray-900">Add MOA Record</h1>
            <p class="text-sm text-gray-500 mt-1">Create a new MOA tracking record</p>
        </div>

        <div class="bg-white rounded-lg p-8 border border-gray-200">
            <form action="{{ route('moa.store') }}" method="POST">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label for="moa" class="block text-sm font-medium text-gray-900 mb-2">Institution <span class="text-red-500">*</span></label>
                        <input type="text" name="moa" id="moa" value="{{ old('moa') }}" required placeholder="Enter institution name" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('moa') border-red-500 @enderror">
                        @error('moa')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="valid_until" class="block text-sm font-medium text-gray-900 mb-2">Valid Date <span class="text-red-500">*</span></label>
                        <input type="date" name="valid_until" id="valid_until" value="{{ old('valid_until') }}" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('valid_until') border-red-500 @enderror">
                        @error('valid_until')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('moa.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        Save MOA
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
