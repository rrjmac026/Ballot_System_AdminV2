<?php
namespace App\Http\Controllers;

use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        // Get all feedbacks with voter details by joining with the Voter table
        $feedbacks = Feedback::leftJoin('voters', 'feedback.voter_id', '=', 'voters.voter_id')
            ->select(
                'feedback.*',
                'voters.name as voter_name',
                'voters.email as voter_email',
                'voters.course as voter_course'
            )
            ->whereBetween('feedback.rating', [1, 5]) // Ensure ratings are valid
            ->whereNotNull('feedback.rating')         // Exclude NULL ratings
            ->paginate(5);

        // Calculate the total 5-star ratings
        $totalFiveStar = Feedback::where('rating', 5)
            ->whereBetween('rating', [1, 5]) // Ensure ratings are only between 1 and 5
            ->count();

                                                                 // Calculate the total number of ratings
        $totalRatings = Feedback::whereBetween('rating', [1, 5]) // Ensure ratings are only between 1 and 5
            ->count();                                               // This is the total number of feedback entries

        // Calculate the percentage of each star rating (1-5)
        $ratingPercentages = [];

        if ($totalRatings > 0) {
            for ($i = 1; $i <= 5; $i++) {
                $count = Feedback::where('rating', $i)
                    ->whereBetween('rating', [1, 5]) // Ensure ratings are only between 1 and 5
                    ->count();
                $ratingPercentages[$i] = round(($count / $totalRatings) * 100, 2);
            }
        }

                                                                  // Calculate average rating (this will give you a value between 1 and 5)
        $averageRating = Feedback::whereBetween('rating', [1, 5]) // Ensure ratings are only between 1 and 5
            ->avg('rating');

        return view('feedback.index', compact('feedbacks', 'totalFiveStar', 'ratingPercentages', 'totalRatings', 'averageRating'));
    }
}
