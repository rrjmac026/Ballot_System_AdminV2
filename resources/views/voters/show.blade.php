@extends('layouts.app')
@section('content')
<div class="container">
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Voter Details</h2>
        </div>
        
        <div class="p-6">
            <dl class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Name</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-gray-100">{{ $voter->name }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Student ID</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-gray-100">{{ $voter->student_id }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">College</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-gray-100">{{ $voter->college->name }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Course</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-gray-100">{{ $voter->course }}</dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Year Level</dt>
                    <dd class="mt-1 text-lg text-gray-900 dark:text-gray-100">{{ $voter->year_level }}st Year</dd>
                </div>
            </dl>

            <div class="mt-6 flex space-x-3">
                <a href="{{ route('voters.edit', $voter) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                <a href="{{ route('voters.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
