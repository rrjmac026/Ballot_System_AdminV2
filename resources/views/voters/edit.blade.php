@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Edit Voter</h2>
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
        <form action="{{ route('voters.update', $voter) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                    <input type="text" name="name" value="{{ $voter->name }}" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Student ID</label>
                    <input type="text" name="student_id" value="{{ $voter->student_id }}" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">College</label>
                    <select name="college_id" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @foreach($colleges as $college)
                            <option value="{{ $college->college_id }}" {{ $voter->college_id == $college->college_id ? 'selected' : '' }}>
                                {{ $college->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Course</label>
                    <input type="text" name="course" value="{{ $voter->course }}" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Year Level</label>
                    <select name="year_level" class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @for($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $voter->year_level == $i ? 'selected' : '' }}>
                                {{ $i }}st Year
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Voter
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
