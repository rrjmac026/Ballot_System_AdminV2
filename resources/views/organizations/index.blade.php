@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Organizations</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Manage student organizations and their details</p>
        </div>
        <a href="{{ route('organizations.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-plus mr-2"></i>
            <span>Add Organization</span>
        </a>
    </div>

    <!-- Search and Filter Section -->
    <div class="mb-6 bg-white dark:bg-gray-800 rounded-lg p-4 shadow-md">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" 
                       placeholder="Search organizations..." 
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex gap-4">
                <select class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500">
                    <option value="">All Colleges</option>
                    <!-- Add college options here -->
                </select>
            </div>
        </div>
    </div>

    <!-- Organizations Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($organizations as $organization)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition duration-200">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-lg bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                            <i class="fas fa-building text-blue-500 dark:text-blue-400 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ $organization->name }}
                            </h3>
                        </div>
                    </div>
                </div>

                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                    {{ $organization->description }}
                </p>

                <div class="flex justify-end gap-2 mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('organizations.show', $organization) }}" 
                       class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-600 hover:bg-blue-200 rounded-md dark:bg-blue-900 dark:text-blue-400">
                        <i class="fas fa-eye mr-1"></i> View
                    </a>
                    <a href="{{ route('organizations.edit', $organization) }}" 
                       class="inline-flex items-center px-3 py-1 bg-green-100 text-green-600 hover:bg-green-200 rounded-md dark:bg-green-900 dark:text-green-400">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form action="{{ route('organizations.destroy', $organization) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-3 py-1 bg-red-100 text-red-600 hover:bg-red-200 rounded-md dark:bg-red-900 dark:text-red-400"
                                onclick="return confirm('Are you sure you want to delete this organization?')">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
