@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mb-2">Register New Voter</h2>
            <p class="text-gray-600 dark:text-gray-400">Add a new voter to the election system</p>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700">
        @if ($errors->any())
        <div class="bg-red-50 dark:bg-red-900 border border-red-200 dark:border-red-800 rounded-lg p-4 m-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle text-red-500"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800 dark:text-red-200">Please fix the following errors:</h3>
                    <ul class="mt-2 text-sm text-red-700 dark:text-red-300">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <form action="{{ route('voters.store') }}" method="POST">
            @csrf
            <div class="space-y-8 p-6">
                <!-- Personal Information Section -->
                <div class="bg-gray-50 dark:bg-gray-750 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4 flex items-center">
                        <i class="fas fa-user-circle mr-2 text-blue-500"></i>
                        Personal Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="form-input w-full rounded-lg @error('name') border-red-500 @enderror"
                                   placeholder="Full Name">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Sex</label>
                            <select name="sex" class="form-select w-full rounded-lg @error('sex') border-red-500 @enderror">
                                <option value="">Select Gender</option>
                                <option value="M" {{ old('sex') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="F" {{ old('sex') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('sex')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Academic Information Section -->
                <div class="bg-gray-50 dark:bg-gray-750 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4 flex items-center">
                        <i class="fas fa-graduation-cap mr-2 text-green-500"></i>
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
                                   class="form-input w-full rounded-lg @error('course') border-red-500 @enderror"
                                   placeholder="Enter Course">
                            @error('course')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Year Level</label>
                            <select name="year_level" class="form-select w-full rounded-lg @error('year_level') border-red-500 @enderror">
                                <option value="">Select Year Level</option>
                                <option value="1" {{ old('year_level') == '1' ? 'selected' : '' }}>1st Year</option>
                                <option value="2" {{ old('year_level') == '2' ? 'selected' : '' }}>2nd Year</option>
                                <option value="3" {{ old('year_level') == '3' ? 'selected' : '' }}>3rd Year</option>
                                <option value="4" {{ old('year_level') == '4' ? 'selected' : '' }}>4th Year</option>
                            </select>
                            @error('year_level')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Student Number</label>
                            <input type="text" name="student_number" value="{{ old('student_number') }}"
                                   class="form-input w-full rounded-lg @error('student_number') border-red-500 @enderror"
                                   placeholder="Enter Student Number">
                            @error('student_number')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Contact Information Section -->
                <div class="bg-gray-50 dark:bg-gray-750 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-4 flex items-center">
                        <i class="fas fa-envelope mr-2 text-purple-500"></i>
                        Contact Information
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-input w-full rounded-lg @error('email') border-red-500 @enderror"
                                   placeholder="university@email.com">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 dark:bg-gray-750 px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('voters.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-200">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Register Voter
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    /* Custom styles for form inputs */
    .form-input, .form-select {
        @apply bg-white dark:bg-gray-700 border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200;
    }
    
    /* Custom hover effects */
    .form-input:hover, .form-select:hover {
        @apply border-gray-400 dark:border-gray-500;
    }

    /* Custom section styling */
    .dark .dark\:bg-gray-750 {
        background-color: #1f2937;
    }
</style>
@endsection
