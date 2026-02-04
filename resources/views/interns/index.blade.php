@extends('layouts.app')

@section('title', 'Interns Masterlist')

@section('content')
<div class="flex flex-col">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Masterlist</h1>
        <a href="{{ route('interns.create') }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-xs font-medium rounded hover:bg-blue-700 transition-colors">
            + Add
        </a>
    </div>

    @if($interns->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20a9 9 0 0118 0v2h2v-2a11 11 0 00-20 0v2h2v-2z" />
            </svg>
            <h3 class="text-gray-900 font-medium mb-1">No interns yet</h3>
            <p class="text-gray-500 text-sm mb-4">Get started by adding your first intern</p>
            <a href="{{ route('interns.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                Add Intern
            </a>
        </div>
    @else
        <div class="space-y-2">
            @foreach($interns as $intern)
                <div class="bg-white border border-gray-200 rounded p-4 hover:shadow transition-shadow">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <h3 class="text-base font-semibold text-gray-900">{{ $intern->name }}</h3>
                            <p class="text-sm text-gray-500 mt-0.5">{{ $intern->course ?? 'No course' }} • {{ $intern->school ?? 'No school' }}</p>
                        </div>
                        <div class="flex items-center gap-2 flex-shrink-0">
                            @if($intern->status == 'Waiting')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-700">Waiting</span>
                            @elseif($intern->status == 'Ongoing')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-700">Ongoing</span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-sm font-medium bg-green-100 text-green-700">Finished</span>
                            @endif
                            <a href="{{ route('interns.edit', $intern) }}" class="inline-flex items-center justify-center w-8 h-8 text-gray-300 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            </a>
                            <form action="{{ route('interns.destroy', $intern) }}" method="POST" class="inline" onsubmit="return confirm('Delete this intern?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center justify-center w-8 h-8 text-gray-300 hover:text-red-600 hover:bg-red-50 rounded transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-sm">
                        @if($intern->email)
                            <div><p class="text-gray-500">Email</p><p class="text-gray-900 font-medium truncate">{{ $intern->email }}</p></div>
                        @endif
                        @if($intern->department)
                            <div><p class="text-gray-500">Department</p><p class="text-gray-900 font-medium">{{ $intern->department }}</p></div>
                        @endif
                        @if($intern->start_date)
                            <div><p class="text-gray-500">Start Date</p><p class="text-gray-900 font-medium">{{ $intern->start_date->format('M d, Y') }}</p></div>
                        @endif
                        @if($intern->end_date)
                            <div><p class="text-gray-500">End Date</p><p class="text-gray-900 font-medium">{{ $intern->end_date->format('M d, Y') }}</p></div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection