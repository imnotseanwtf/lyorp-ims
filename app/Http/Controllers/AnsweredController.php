<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AssignToAnswer;
use Illuminate\Http\Request;

class AnsweredController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $assign = AssignToAnswer::findOrFail($id);

        $answers = Answer::where('assign_to_answer_id', $id)
            ->with('question')
            ->get();

        $ratings = ['Excellent', 'Very Good', 'Good', 'Fair', 'Poor'];
        $totals = [];
        $totalQuestions = 0;

        // Initialize totals for each rating
        foreach ($ratings as $rating) {
            $totals[$rating] = [
                'tally' => 0,
                'percentage' => 0,
            ];
        }

        foreach ($answers as $answer) {
            $tally = array_fill_keys($ratings, 0);
            $totalQuestions++; // Increase the total questions count

            // Tally answers based on Likert criteria
            if ($answer->assignToAnswer->criteria->answer_type === 'Likert Scales (Poor - Excellent)' && array_key_exists($answer->answer, $tally)) {
                $tally[$answer->answer]++;
            }

            // Calculate percentages for Likert answers
            $percentages = [];
            foreach ($ratings as $rating) {
                $percentages[$rating] = array_sum($tally) > 0
                    ? round(($tally[$rating] / array_sum($tally)) * 100, 1)
                    : 0;
            }

            // Store tally and percentages by rating
            foreach ($ratings as $rating) {
                $totals[$rating]['tally'] += $tally[$rating];
                $totals[$rating]['percentage'] = $percentages[$rating]; // Update the percentage for each rating
            }
        }

        return view('answers.index', compact('answers', 'assign', 'totals', 'ratings', 'totalQuestions'));
    }
}
