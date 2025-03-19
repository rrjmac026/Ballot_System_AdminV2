@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Create Position</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Add a new election position</p>
        </div>
        <a href="{{ route('positions.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Position Name</label>
                    <input type="text" name="name" 
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-green-500 focus:ring-green-500" 
                           placeholder="Enter position name" required>
                </div>

                <div class="flex justify-end space-x-4 mt-6">
                    <button type="reset" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                        Clear Form
                    </button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-200 flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Create Position
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
