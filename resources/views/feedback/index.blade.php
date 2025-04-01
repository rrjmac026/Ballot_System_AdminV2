@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Feedback and Reviews</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Track ratings and reviews to improve the experience.</p>
    </div>

    <!-- cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">

    <!-- Big Numeric Rating -->
    <div class="rounded-2xl shadow-lg p-8 bg-white dark:bg-gray-800 text-center">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Overall Rating</h3>
        <p class="text-8xl font-bold text-yellow-400">5.0</p>
        <p class="text-gray-600 dark:text-gray-400 mt-2">Based on 120 reviews</p>
    </div>

    <!-- Star Rating -->
    <div class="rounded-2xl shadow-lg p-8 bg-white dark:bg-gray-800 col-span-2">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">User Ratings</h3>

        <!-- Star Rating Breakdown -->
        <div class="space-y-3">
            <div class="flex items-center">
                <span class="w-20 text-sm text-gray-600 dark:text-gray-400">5 Stars</span>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-2 rounded-lg">
                    <div class="bg-yellow-400 h-2 rounded-lg" style="width: 80%;"></div>
                </div>
                <span class="ml-3 text-sm text-gray-600 dark:text-gray-400">80%</span>
            </div>

            <div class="flex items-center">
                <span class="w-20 text-sm text-gray-600 dark:text-gray-400">4 Stars</span>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-2 rounded-lg">
                    <div class="bg-yellow-400 h-2 rounded-lg" style="width: 15%;"></div>
                </div>
                <span class="ml-3 text-sm text-gray-600 dark:text-gray-400">15%</span>
            </div>

            <div class="flex items-center">
                <span class="w-20 text-sm text-gray-600 dark:text-gray-400">3 Stars</span>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-2 rounded-lg">
                    <div class="bg-yellow-400 h-2 rounded-lg" style="width: 3%;"></div>
                </div>
                <span class="ml-3 text-sm text-gray-600 dark:text-gray-400">3%</span>
            </div>

            <div class="flex items-center">
                <span class="w-20 text-sm text-gray-600 dark:text-gray-400">2 Stars</span>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-2 rounded-lg">
                    <div class="bg-yellow-400 h-2 rounded-lg" style="width: 1%;"></div>
                </div>
                <span class="ml-3 text-sm text-gray-600 dark:text-gray-400">1%</span>
            </div>

            <div class="flex items-center">
                <span class="w-20 text-sm text-gray-600 dark:text-gray-400">1 Star</span>
                <div class="w-full bg-gray-200 dark:bg-gray-700 h-2 rounded-lg">
                    <div class="bg-yellow-400 h-2 rounded-lg" style="width: 1%;"></div>
                </div>
                <span class="ml-3 text-sm text-gray-600 dark:text-gray-400">1%</span>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection
