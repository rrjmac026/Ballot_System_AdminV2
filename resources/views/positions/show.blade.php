@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Position Details</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">View position information</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('positions.edit', $position) }}" 
               class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('positions.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 gap-6">
                <div class="flex items-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg">
                    <div class="p-3 rounded-full bg-green-100 dark:bg-green-900">
                        <i class="fas fa-user-tie text-green-500 dark:text-green-400 text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                            {{ $position->name }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">Position</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</h4>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">
                            {{ $position->created_at->format('F d, Y h:i A') }}
                        </p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</h4>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">
                            {{ $position->updated_at->format('F d, Y h:i A') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
