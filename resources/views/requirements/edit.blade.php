@extends('layouts.app')

@section('title', 'Edit Requirements')

@section('content')
<div class="max-w-2xl">
    <div class="mb-8">
        <h1 class="text-3xl font-light text-gray-900 mb-2">Requirements for {{ $intern->name }}</h1>
        <p class="text-gray-500 text-sm">Upload and manage required documents</p>
    </div>

    <div class="bg-white border border-gray-200 rounded-lg p-8">
        <form action="{{ route('requirements.update', $intern) }}" method="POST" class="space-y-8">
            @csrf
            @method('PUT')

            <!-- MOA Checkbox -->
            <div>
                <h3 class="text-sm font-semibold text-gray-900 mb-4">Required Documents</h3>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="checkbox" name="moa" value="1" {{ old('moa', $requirement?->moa) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300">
                        <span class="ml-3 text-sm text-gray-700">MOA (Memorandum of Agreement)</span>
                    </label>
                </div>
            </div>

            <!-- Valid Until Date -->
            <div>
                <label for="valid_until" class="block text-sm font-medium text-gray-900 mb-2">Valid Until</label>
                <input type="date" name="valid_until" id="valid_until" value="{{ old('valid_until', $requirement?->valid_until?->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                <a href="{{ route('requirements.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                    Cancel
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                    Save Requirements
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
