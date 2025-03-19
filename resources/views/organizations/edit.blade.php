@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Edit Organization</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Update organization information</p>
        </div>
        <a href="{{ route('organizations.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition duration-200 shadow-md hover:shadow-lg">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to List
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <form action="{{ route('organizations.update', $organization) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Organization Name</label>
                    <input type="text" name="name" value="{{ $organization->name }}"
                           class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500" 
                           required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">College</label>
                    <select name="college_id" 
                            class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500" 
                            required>
                        @foreach($colleges as $college)
                            <option value="{{ $college->college_id }}" 
                                    {{ $organization->college_id == $college->college_id ? 'selected' : '' }}>
                                {{ $college->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Description</label>
                    <textarea name="description" rows="4" 
                              class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500" 
                              required>{{ $organization->description }}</textarea>
                </div>

                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('organizations.show', $organization) }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition duration-200">
                        Cancel
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Update Organization
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
