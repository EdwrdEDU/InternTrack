@extends('layouts.app')

@section('title', 'Requirements Checklist')

@section('content')
<div class="flex flex-col">
    <div class="mb-8">
        <h1 class="text-3xl font-light text-gray-900 mb-2">Requirements Checklist</h1>
        <p class="text-gray-500 text-sm">Track and manage document requirements for all interns</p>
    </div>

    @if($interns->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="text-gray-900 font-medium mb-1">No interns yet</h3>
            <p class="text-gray-500 text-sm">Add interns to track their requirements</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="border-b border-gray-200 bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Name</th>
                        <th class="px-4 py-3 text-center font-semibold text-gray-900">MOA</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-900">Valid Until</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($interns as $intern)
                        @php $req = $intern->requirement; @endphp
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $intern->name }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="{{ $req?->moa ? 'text-green-600 text-lg' : 'text-gray-300' }}">{{ $req?->moa ? '✓' : '○' }}</span>
                            </td>
                            <td class="px-4 py-3 text-gray-500">{{ $req?->valid_until?->format('M d, Y') ?? '-' }}</td>
                            <td class="px-4 py-3 text-right">
                                <a href="{{ route('requirements.edit', $intern) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

