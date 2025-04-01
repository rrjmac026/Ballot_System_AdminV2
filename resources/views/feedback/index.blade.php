@extends('layouts.app')
@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Feedback and Reviews</h2>
        <p class="text-gray-600 dark:text-gray-400 mt-1">Track ratings and reviews to improve the experience.</p>
    </div>

    <!-- cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">

        <!-- Overall Rating -->
        <div class="rounded-2xl shadow-lg p-8 bg-white dark:bg-gray-800 text-center">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Overall Rating</h3>
            <p class="text-8xl font-bold text-yellow-400">{{ number_format($averageRating, 1) }}</p>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Based on {{ $totalRatings }} reviews</p>
        </div>

        <!-- Star Rating Breakdown -->
        <div class="rounded-2xl shadow-lg p-8 bg-white dark:bg-gray-800 col-span-2">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">User Ratings</h3>

            <!-- Star Rating Breakdown -->
            <div class="space-y-3">
                @foreach ($ratingPercentages as $stars => $percentage)
                    <div class="flex items-center">
                        <span class="w-20 text-sm text-gray-600 dark:text-gray-400">{{ $stars }} Stars</span>
                        <div class="w-full bg-gray-200 dark:bg-gray-700 h-2 rounded-lg">
                            <div class="bg-yellow-400 h-2 rounded-lg" style="width: {{ $percentage }}%;"></div>
                        </div>
                        <span class="ml-3 text-sm text-gray-600 dark:text-gray-400">{{ $percentage }}%</span>
                    </div>
                @endforeach
            </div>
        </div>


        <!-- User Feedback Profiles -->
        @foreach ($feedbacks as $feedback)
            <div class="col-span-3 rounded-2xl shadow-lg p-6 bg-white dark:bg-gray-800">
                <!-- User Profile -->
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/user_profile.svg') }}" alt="User Avatar" class="w-12 h-12 rounded-full">

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $feedback->voter_name }}
                        </h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ $feedback->voter_email }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Course: {{ $feedback->voter_course }}
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Submitted on {{ \Carbon\Carbon::parse($feedback->created_at)->format('F d, Y') }}
                        </p>
                    </div>
                </div>

                <!-- Ratings -->
                <div class="mt-3 flex items-center">
                    <span class="text-yellow-400 text-xl">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $feedback->rating)
                                &#9733; <!-- Full star -->
                            @else
                                &#9734; <!-- Empty star -->
                            @endif
                        @endfor
                    </span>
                    <p class="ml-2 text-gray-700 dark:text-gray-300">{{ $feedback->rating }} out of 5</p>
                </div>

                <!-- Feedback Message -->
                <p class="mt-3 text-gray-700 dark:text-gray-300">
                    "{{ $feedback->feedback }}"
                </p>
            </div>
        @endforeach
    </div>

    <div class="mt-5">
        {{ $feedbacks->links() }}
    </div>
</div>
@endsection
