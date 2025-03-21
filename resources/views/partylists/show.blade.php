@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Partylist Details</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">View political party information</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('partylists.edit', $partylist) }}" 
               class="inline-flex items-center px-4 py-2 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-edit mr-2"></i>
                Edit
            </a>
            <a href="{{ route('partylists.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to List
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
        <div class="p-6">
            <div class="mb-8">
                <div class="flex items-center p-4 bg-orange-50 dark:bg-orange-900/20 rounded-lg">
                    <div class="p-3 rounded-full bg-orange-100 dark:bg-orange-900">
                        <i class="fas fa-flag text-orange-500 dark:text-orange-400 text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                            {{ $partylist->name }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-400">Political Party</p>
                    </div>
                </div>
            </div>

            <div class="mb-8">
                <h4 class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Description</h4>
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <p class="text-gray-600 dark:text-gray-400 whitespace-pre-line">
                        {{ $partylist->description }}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-t border-gray-200 dark:border-gray-700 pt-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Created At</h4>
                    <p class="mt-1 text-gray-900 dark:text-gray-100">
                        {{ $partylist->created_at->format('F d, Y h:i A') }}
                    </p>
                </div>
                <div>
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Last Updated</h4>
                    <p class="mt-1 text-gray-900 dark:text-gray-100">
                        {{ $partylist->updated_at->format('F d, Y h:i A') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
