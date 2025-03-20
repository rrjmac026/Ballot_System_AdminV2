@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Organization Details</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">View organization information</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('organizations.edit', $organization) }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('organizations.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="col-span-2">
                    <div class="flex items-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                            <i class="fas fa-building text-blue-500 dark:text-blue-400 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                {{ $organization->name }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400">
                                {{ $organization->college ? $organization->college->name : 'University-wide Organization' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-span-2">
                    <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Description</h4>
                    <p class="text-gray-600 dark:text-gray-400 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                        {{ $organization->description }}
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Created At</h4>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ $organization->created_at->format('F d, Y h:i A') }}
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Last Updated</h4>
                    <p class="text-gray-600 dark:text-gray-400">
                        {{ $organization->updated_at->format('F d, Y h:i A') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
