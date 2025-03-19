@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Candidate Details</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">View candidate information</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('candidates.edit', $candidate) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('candidates.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 gap-6">
                <!-- Personal Information -->
                <div class="flex items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                    <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                        <i class="fas fa-user text-blue-500 dark:text-blue-400 text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                            {{ $candidate->first_name }} {{ $candidate->middle_name }} {{ $candidate->last_name }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">Candidate Information</p>
                    </div>
                </div>

                <!-- Details Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                    <!-- Academic Information -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">Academic Details</h4>
                        <dl class="grid grid-cols-1 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">College</dt>
                                <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $candidate->college->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Course</dt>
                                <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $candidate->course }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Election Information -->
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-4">Election Details</h4>
                        <dl class="grid grid-cols-1 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Position</dt>
                                <dd class="mt-1">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        {{ $candidate->position->name }}
                                    </span>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Organization</dt>
                                <dd class="mt-1 text-gray-900 dark:text-gray-100">{{ $candidate->organization->name }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Partylist</dt>
                                <dd class="mt-1">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        {{ $candidate->partylist->name }}
                                    </span>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
