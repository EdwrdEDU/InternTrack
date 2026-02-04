@extends('layouts.app')

@section('title', 'MOA Tracking')

@section('content')
<div class="flex flex-col">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">MOA Tracking</h1>
        <a href="{{ route('moa.create') }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded hover:bg-blue-700 transition-colors">
            + Add MOA
        </a>
    </div>

    @if($moaRecords->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="text-gray-900 font-medium mb-1">No MOA records yet</h3>
            <p class="text-gray-500 text-sm mb-4">Get started by adding your first MOA record</p>
            <a href="{{ route('moa.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                Add MOA Record
            </a>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="border-b border-gray-200 bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Intern Name</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">MOA</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Valid Until</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-900">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($moaRecords as $record)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $record->intern->name }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $record->moa }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $record->valid_until?->format('M d, Y') ?? '-' }}</td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('moa.edit', $record) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm">Edit</a>
                                    <form action="{{ route('moa.destroy', $record) }}" method="POST" class="inline" onsubmit="return confirm('Delete this MOA record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700 font-medium text-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
