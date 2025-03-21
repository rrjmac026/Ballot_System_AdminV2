@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Edit Candidate</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Update candidate information</p>
        </div>
        <a href="{{ route('candidates.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6">
        <form action="{{ route('candidates.update', $candidate) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Photo Section -->
                <div class="md:col-span-2 flex flex-col items-center p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                    <div class="w-32 h-32 mb-4">
                        @if($candidate->photo)
                            <img src="{{ asset('storage/candidates/' . $candidate->photo) }}" 
                                 alt="{{ $candidate->first_name }}'s photo" 
                                 class="w-full h-full object-cover rounded-lg">
                        @else
                            <div class="w-full h-full rounded-lg bg-gray-200 dark:bg-gray-600 flex items-center justify-center">
                                <i class="fas fa-user text-4xl text-gray-400"></i>
                            </div>
                        @endif
                    </div>
                    <input type="file" name="photo" accept="image/*" 
                           class="block w-full text-sm text-gray-500 dark:text-gray-400
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-lg file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100
                                  dark:file:bg-blue-900 dark:file:text-blue-200">
                </div>

                <!-- Personal Information -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $candidate->first_name) }}" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $candidate->last_name) }}" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Middle Name</label>
                    <input type="text" name="middle_name" value="{{ old('middle_name', $candidate->middle_name) }}" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                </div>

                <!-- Academic Information -->
                <div class="md:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                        Academic Information
                    </h3>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">College</label>
                    <select name="college_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required>
                        @foreach($colleges as $college)
                            <option value="{{ $college->college_id }}" {{ $candidate->college_id == $college->college_id ? 'selected' : '' }}>
                                {{ $college->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Course</label>
                    <input type="text" name="course" value="{{ old('course', $candidate->course) }}" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required>
                </div>

                <!-- Election Information -->
                <div class="md:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 border-b border-gray-200 dark:border-gray-600 pb-2">
                        Election Information
                    </h3>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Position</label>
                    <select name="position_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required>
                        @foreach($positions as $position)
                            <option value="{{ $position->position_id }}" {{ $candidate->position_id == $position->position_id ? 'selected' : '' }}>
                                {{ $position->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Partylist</label>
                    <select name="partylist_id" class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white" required>
                        @foreach($partylists as $partylist)
                            <option value="{{ $partylist->partylist_id }}" {{ $candidate->partylist_id == $partylist->partylist_id ? 'selected' : '' }}>
                                {{ $partylist->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Platform -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Platform</label>
                    <textarea name="platform" rows="4" 
                              class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">{{ old('platform', $candidate->platform) }}</textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-3">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Update Candidate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
