@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Political Parties</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Manage student political parties and coalitions</p>
        </div>
        <a href="{{ route('partylists.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-plus mr-2"></i>
            <span>Add Partylist</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($partylists as $partylist)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition duration-200">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-lg bg-orange-100 dark:bg-orange-900 flex items-center justify-center">
                            <i class="fas fa-flag text-orange-500 dark:text-orange-400 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ $partylist->name }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Political Party</p>
                        </div>
                    </div>
                </div>

                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                    {{ $partylist->description }}
                </p>

                <div class="flex justify-end gap-2 mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('partylists.show', $partylist) }}" 
                       class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-600 hover:bg-blue-200 rounded-md dark:bg-blue-900 dark:text-blue-400">
                        <i class="fas fa-eye mr-1"></i> View
                    </a>
                    <a href="{{ route('partylists.edit', $partylist) }}" 
                       class="inline-flex items-center px-3 py-1 bg-amber-100 text-amber-600 hover:bg-amber-200 rounded-md dark:bg-amber-900 dark:text-amber-400">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form action="{{ route('partylists.destroy', $partylist) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-3 py-1 bg-red-100 text-red-600 hover:bg-red-200 rounded-md dark:bg-red-900 dark:text-red-400"
                                onclick="return confirm('Are you sure you want to delete this partylist?')">
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
