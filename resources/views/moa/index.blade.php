@extends('layouts.app')

@section('title', 'MOA Tracking')

@section('content')
<div class="flex flex-col">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-light text-gray-900">MOA Tracking</h1>
        </div>
        <a href="{{ route('moa.create') }}" class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white text-sm font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 shadow-sm hover:shadow-md transition-all duration-200">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Add MOA
        </a>
    </div>

    <!-- Search and Filter Controls -->
    <div class="bg-white border border-gray-200 rounded-xl p-4 mb-6">
        <form method="GET" action="{{ route('moa.index') }}" class="flex flex-col sm:flex-row gap-3">
            <div class="flex-1">
                <div class="relative">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by institution..." class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>
            <div class="flex gap-2">
                <select name="status" class="px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="valid" {{ request('status') === 'valid' ? 'selected' : '' }}>Valid</option>
                    <option value="expired" {{ request('status') === 'expired' ? 'selected' : '' }}>Expired</option>
                </select>
                <button type="submit" class="px-6 py-2.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                    Apply
                </button>
                @if(request('search') || request('status'))
                    <a href="{{ route('moa.index') }}" class="px-4 py-2.5 border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">
                        Clear
                    </a>
                @endif
            </div>
        </form>
    </div>

    @if($moaRecords->isEmpty())
        <div class="bg-gradient-to-br from-gray-50 to-purple-50 rounded-2xl border border-gray-200 text-center py-16 px-6">
            @if(request('search') || request('status'))
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">No results found</h3>
                <p class="text-gray-600 mb-6">Try adjusting your search or filters</p>
                <a href="{{ route('moa.index') }}" class="text-blue-600 hover:text-blue-700 font-medium">Clear filters</a>
            @else
            <div class="inline-flex items-center justify-center w-16 h-16 bg-purple-100 rounded-full mb-4">
                <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">No MOA records yet</h3>
            <p class="text-gray-600 mb-6 max-w-md mx-auto">Start tracking agreements by creating your first MOA record</p>
            <a href="{{ route('moa.create') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 shadow-md hover:shadow-lg transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add First MOA
            </a>
            @endif
        </div>
    @else
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gradient-to-r from-gray-50 to-blue-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700 uppercase text-xs tracking-wider">Institution</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700 uppercase text-xs tracking-wider">Valid Date</th>
                        <th class="px-6 py-4 text-left font-semibold text-gray-700 uppercase text-xs tracking-wider">Status</th>
                        <th class="px-6 py-4 text-right font-semibold text-gray-700 uppercase text-xs tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($moaRecords as $record)
                        <tr class="hover:bg-blue-50/50 transition-all duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm shadow-sm">
                                        {{ strtoupper(substr($record->moa, 0, 1)) }}
                                    </div>
                                    <span class="font-medium text-gray-900">{{ $record->moa }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span class="text-gray-600">{{ $record->valid_until?->format('M d, Y') ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($record->status === 'Valid')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 border border-green-200">✓ Valid</span>
                                @elseif($record->status === 'Expired')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800 border border-red-200">✕ Expired</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800 border border-gray-200">- No Date</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('moa.edit', $record) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-50 text-blue-700 hover:bg-blue-100 border border-blue-200 rounded-lg font-medium text-xs transition-all duration-150">
                                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('moa.destroy', $record) }}" method="POST" class="inline" onsubmit="return confirm('Delete this MOA record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 hover:bg-red-100 border border-red-200 rounded-lg font-medium text-xs transition-all duration-150">
                                            <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            Delete
                                        </button>
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
