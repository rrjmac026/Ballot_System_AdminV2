@extends('layouts.app')
@section('content')
<div class="container">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-6">Voters</h2>
    <a href="{{ route('voters.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
        Add Voter
    </a>
    
    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Student ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">College</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Course</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Year Level</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                @foreach($voters as $voter)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $voter->voter_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $voter->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $voter->student_id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $voter->college->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $voter->course }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-900 dark:text-gray-300">{{ $voter->year_level }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('voters.show', $voter) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">View</a>
                        <a href="{{ route('voters.edit', $voter) }}" class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300 mr-3">Edit</a>
                        <form action="{{ route('voters.destroy', $voter) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
