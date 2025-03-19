@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">System Settings</h2>
            <p class="text-gray-600 dark:text-gray-400 mt-1">Configure election and system settings</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
        <form action="{{ route('settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Election Schedule -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                    Election Schedule
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Start Date & Time
                        </label>
                        <input type="datetime-local" name="election_start" 
                               value="{{ old('election_start', $settings->election_start?->format('Y-m-d\TH:i')) }}"
                               class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            End Date & Time
                        </label>
                        <input type="datetime-local" name="election_end" 
                               value="{{ old('election_end', $settings->election_end?->format('Y-m-d\TH:i')) }}"
                               class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:border-blue-500 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <!-- System Controls -->
            <div class="mb-8">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4 pb-2 border-b border-gray-200 dark:border-gray-700">
                    System Controls
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center">
                        <input type="checkbox" name="maintenance_mode" id="maintenance_mode"
                               class="rounded border-gray-300 dark:border-gray-600 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               {{ $settings->maintenance_mode ? 'checked' : '' }}>
                        <label for="maintenance_mode" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                            Enable Maintenance Mode
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="registration_enabled" id="registration_enabled"
                               class="rounded border-gray-300 dark:border-gray-600 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               {{ $settings->registration_enabled ? 'checked' : '' }}>
                        <label for="registration_enabled" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                            Enable Voter Registration
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="voting_enabled" id="voting_enabled"
                               class="rounded border-gray-300 dark:border-gray-600 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               {{ $settings->voting_enabled ? 'checked' : '' }}>
                        <label for="voting_enabled" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                            Enable Voting
                        </label>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="results_enabled" id="results_enabled"
                               class="rounded border-gray-300 dark:border-gray-600 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                               {{ $settings->results_enabled ? 'checked' : '' }}>
                        <label for="results_enabled" class="ml-2 text-sm text-gray-700 dark:text-gray-300">
                            Enable Results Viewing
                        </label>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200 flex items-center">
                    <i class="fas fa-save mr-2"></i>
                    Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
