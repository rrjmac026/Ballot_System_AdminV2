@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Colleges</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Manage university colleges and departments</p>
        </div>
        <a href="{{ route('colleges.create') }}" 
           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-plus mr-2"></i>
            <span>Add College</span>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($colleges as $college)
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md hover:shadow-lg transition duration-200">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-lg bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center">
                            <i class="fas fa-university text-indigo-500 dark:text-indigo-400 text-2xl"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ $college->name }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $college->acronym }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-2 mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('colleges.edit', $college) }}" 
                       class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-600 hover:bg-indigo-200 rounded-md dark:bg-indigo-900 dark:text-indigo-400">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form action="{{ route('colleges.destroy', $college) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center px-3 py-1 bg-red-100 text-red-600 hover:bg-red-200 rounded-md dark:bg-red-900 dark:text-red-400"
                                onclick="return confirm('Are you sure you want to delete this college?')">
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
