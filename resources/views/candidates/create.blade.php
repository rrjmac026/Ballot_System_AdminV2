@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Create New Candidate</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Add a new candidate to the election</p>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        @if ($errors->any())
        <div class="bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-800 rounded-lg p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800 dark:text-red-200">
                        There were errors with your submission
                    </h3>
                    <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-8">
                <!-- Personal Information Section -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">
                        Personal Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">First Name</label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}"
                                   class="form-input w-full rounded-lg @error('first_name') border-red-500 @enderror">
                            @error('first_name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Middle Name</label>
                            <input type="text" name="middle_name" value="{{ old('middle_name') }}"
                                   class="form-input w-full rounded-lg @error('middle_name') border-red-500 @enderror">
                            @error('middle_name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Last Name</label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                   class="form-input w-full rounded-lg @error('last_name') border-red-500 @enderror">
                            @error('last_name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-3">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Photo</label>
                            <input type="file" name="photo" accept="image/*"
                                   class="form-input w-full rounded-lg @error('photo') border-red-500 @enderror">
                            @error('photo')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Academic Information Section -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">
                        Academic Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">College</label>
                            <select name="college_id" class="form-select w-full rounded-lg @error('college_id') border-red-500 @enderror">
                                <option value="">Select College</option>
                                @foreach($colleges as $college)
                                    <option value="{{ $college->college_id }}" {{ old('college_id') == $college->college_id ? 'selected' : '' }}>
                                        {{ $college->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('college_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Course</label>
                            <input type="text" name="course" value="{{ old('course') }}"
                                   class="form-input w-full rounded-lg @error('course') border-red-500 @enderror">
                            @error('course')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Election Information Section -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-200 dark:border-gray-700 pb-2">
                        Election Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Position</label>
                            <select name="position_id" class="form-select w-full rounded-lg @error('position_id') border-red-500 @enderror">
                                <option value="">Select Position</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position->position_id }}" {{ old('position_id') == $position->position_id ? 'selected' : '' }}>
                                        {{ $position->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('position_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Partylist</label>
                            <select name="partylist_id" class="form-select w-full rounded-lg @error('partylist_id') border-red-500 @enderror">
                                <option value="">Select Partylist</option>
                                @foreach($partylists as $partylist)
                                    <option value="{{ $partylist->partylist_id }}" {{ old('partylist_id') == $partylist->partylist_id ? 'selected' : '' }}>
                                        {{ $partylist->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('partylist_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Organization</label>
                            <select name="organization_id" class="form-select w-full rounded-lg @error('organization_id') border-red-500 @enderror">
                                <option value="">Select Organization</option>
                                @foreach($organizations as $organization)
                                    <option value="{{ $organization->organization_id }}">{{ $organization->name }}</option>
                                @endforeach
                            </select>
                            @error('organization_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Create Candidate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
