@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Edit Partylist</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Update political party information</p>
        </div>
        <a href="{{ route('partylists.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <form action="{{ route('partylists.update', $partylist) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Party Name</label>
                    <input type="text" name="name" value="{{ $partylist->name }}"
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-orange-500 focus:ring-orange-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <textarea name="description" rows="6" 
                              class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-orange-500 focus:ring-orange-500" required>{{ $partylist->description }}</textarea>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Write a brief description of the party's mission, vision, and objectives.</p>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('partylists.show', $partylist) }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-orange-600 text-white rounded-lg hover:bg-orange-700 transition duration-200 flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Update Partylist
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
