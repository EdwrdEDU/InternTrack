@extends('layouts.app')

@section('title', 'Edit Intern')

@section('content')
<div class="min-h-screen py-12">
    <div class="max-w-6xl px-4">
        <div class="mb-8">
            <h1 class="text-3xl font-semibold text-gray-900">Edit Intern</h1>
            <p class="text-sm text-gray-500 mt-1">Update {{ $intern->name }}'s information</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left side - Intern form (2 columns) -->
            <div class="lg:col-span-2 bg-white rounded-lg p-8 border border-gray-200">
                <form action="{{ route('interns.update', $intern) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-900 mb-2">Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name" value="{{ old('name', $intern->name) }}" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('name') border-red-500 @enderror">
                            @error('name')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-900 mb-2">Status <span class="text-red-500">*</span></label>
                            <select name="status" id="status" required class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('status') border-red-500 @enderror">
                                <option value="Waiting" {{ old('status', $intern->status) == 'Waiting' ? 'selected' : '' }}>Waiting</option>
                                <option value="Ongoing" {{ old('status', $intern->status) == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="Finished" {{ old('status', $intern->status) == 'Finished' ? 'selected' : '' }}>Finished</option>
                            </select>
                            @error('status')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="school" class="block text-sm font-medium text-gray-900 mb-2">School</label>
                            <input type="text" name="school" id="school" value="{{ old('school', $intern->school) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('school') border-red-500 @enderror">
                            @error('school')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="course" class="block text-sm font-medium text-gray-900 mb-2">Course</label>
                            <input type="text" name="course" id="course" value="{{ old('course', $intern->course) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('course') border-red-500 @enderror">
                            @error('course')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-900 mb-2">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $intern->email) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('email') border-red-500 @enderror">
                            @error('email')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="department" class="block text-sm font-medium text-gray-900 mb-2">Department</label>
                            <input type="text" name="department" id="department" value="{{ old('department', $intern->department) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('department') border-red-500 @enderror">
                            @error('department')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="supervisor_trainer_name" class="block text-sm font-medium text-gray-900 mb-2">Supervisor/Trainer</label>
                            <input type="text" name="supervisor_trainer_name" id="supervisor_trainer_name" value="{{ old('supervisor_trainer_name', $intern->supervisor_trainer_name) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('supervisor_trainer_name') border-red-500 @enderror">
                            @error('supervisor_trainer_name')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-900 mb-2">Start Date</label>
                            <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $intern->start_date?->format('Y-m-d')) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('start_date') border-red-500 @enderror">
                            @error('start_date')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-900 mb-2">End Date</label>
                            <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $intern->end_date?->format('Y-m-d')) }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all @error('end_date') border-red-500 @enderror">
                            @error('end_date')<p class="text-red-500 text-xs mt-1.5">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                        <a href="{{ route('interns.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                            Update Intern
                        </button>
                    </div>
                </form>
            </div>

            <!-- Right side - Requirements checkboxes -->
            <form action="{{ route('requirements.update', $intern->requirement) }}" method="POST" class="bg-white rounded-lg p-8 border border-gray-200">
                @csrf
                @method('PUT')
                <h3 class="text-sm font-semibold text-gray-900 mb-4">Required Documents</h3>
                <div class="space-y-3">
                    <label class="flex items-center">
                        <input type="checkbox" name="pds" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300" {{ $intern->requirement->pds ? 'checked' : '' }}>
                        <span class="ml-3 text-base text-gray-700">PDS (Personal Data Sheet)</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="waiver" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300" {{ $intern->requirement->waiver ? 'checked' : '' }}>
                        <span class="ml-3 text-base text-gray-700">Waiver</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="med_cert" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300" {{ $intern->requirement->med_cert ? 'checked' : '' }}>
                        <span class="ml-3 text-base text-gray-700">Medical Certificate</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="moa" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300" {{ $intern->requirement->moa ? 'checked' : '' }}>
                        <span class="ml-3 text-base text-gray-700">MOA (Memorandum of Agreement)</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="photo_2x2" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300" {{ $intern->requirement->photo_2x2 ? 'checked' : '' }}>
                        <span class="ml-3 text-base text-gray-700">2x2 Photo</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="accomplishment_report" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300" {{ $intern->requirement->accomplishment_report ? 'checked' : '' }}>
                        <span class="ml-3 text-base text-gray-700">Accomplishment/Narrative Report</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="certificate_of_completion" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-500 border-gray-300" {{ $intern->requirement->certificate_of_completion ? 'checked' : '' }}>
                        <span class="ml-3 text-base text-gray-700">Certificate of Completion</span>
                    </label>
                </div>
                <button type="submit" class="mt-[175px] ml-[40px] px-6 py-2 bg-green-600 text-white text-base font-medium rounded-lg hover:bg-green-700 transition-colors">
                    Save Requirements
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
