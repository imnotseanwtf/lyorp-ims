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
        $totalQuestions = $answers->count(); // Total number of answers

        $tally = array_fill_keys($ratings, 0);

        foreach ($answers as $answer) {
            // Tally answers based on Likert criteria
            if ($assign->criteria->answer_type === 'Likert Scales (Poor - Excellent)' && array_key_exists($answer->answer, $tally)) {
                $tally[$answer->answer]++;
            }
        }

        // Calculate percentages for Likert answers
        $percentages = [];
        foreach ($ratings as $rating) {
            $percentages[$rating] = array_sum($tally) > 0
                ? round(($tally[$rating] / array_sum($tally)) * 100, 1)
                : 0;
        }

        // Store the overall tally and percentages
        $totals[] = [
            'tally' => $tally,
            'percentages' => $percentages,
        ];

        return view('answers.index', compact('answers', 'assign', 'totals', 'ratings', 'totalQuestions'));
    }
}
