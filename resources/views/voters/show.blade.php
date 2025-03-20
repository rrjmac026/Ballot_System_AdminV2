@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Voter Details</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">View voter information</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('voters.edit', $voter) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('voters.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="flex items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg mb-6">
                <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                    <i class="fas fa-user text-blue-500 dark:text-blue-400 text-2xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ $voter->name }}</h3>
                    <p class="text-gray-600 dark:text-gray-400">Student Number: {{ $voter->student_number }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">Basic Information</h4>
                    <dl class="grid grid-cols-1 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Email</dt>
                            <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $voter->email }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Status</dt>
                            <dd class="mt-1">
                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $voter->status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $voter->status }}
                                </span>
                            </dd>
                        </div>
                    </dl>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">Academic Information</h4>
                    <dl class="grid grid-cols-1 gap-4">
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">College</dt>
                            <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $voter->college->name }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Course</dt>
                            <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $voter->course }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Year Level</dt>
                            <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $voter->year_level }}st Year</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
