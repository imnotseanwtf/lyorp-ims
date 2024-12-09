<?php

namespace App\Http\Controllers;

use App\Models\AssignToAnswer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfAnswerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $assignToAnswers = AssignToAnswer::where('id', $id)
            ->where('is_answered', true)
            ->with(['answers.question', 'criteria', 'user'])
            ->get();

        $ratings = ['Excellent', 'Very Good', 'Good', 'Fair', 'Poor'];
        $totals = [];

        foreach ($assignToAnswers as $assignToAnswer) {
            $tally = array_fill_keys($ratings, 0);
            $totalQuestions = $assignToAnswer->answers->count();

            foreach ($assignToAnswer->answers as $answer) {
                // Only tally answers if criteria's answer_type is Likert
                if ($assignToAnswer->criteria->answer_type === 'Likert Scales (Poor - Excellent)' && array_key_exists($answer->answer, $tally)) {
                    $tally[$answer->answer]++;
                }
            }

            // Calculate percentages for Likert answers only
            $percentages = [];
            foreach ($ratings as $rating) {
                $percentages[$rating] = array_sum($tally) > 0
                    ? round(($tally[$rating] / array_sum($tally)) * 100, 1)
                    : 0;
            }

            $totals[] = [
                'criteria' => $assignToAnswer->criteria->name ?? 'N/A',
                'answered_on' => $assignToAnswer->updated_at->format('F j, Y, g:i a'),
                'answers' => $assignToAnswer->answers,
                'tally' => $tally,
                'percentages' => $percentages,
                'total_questions' => $totalQuestions,
            ];
        }

        $pdf = Pdf::loadView('evaluation.pdf', compact('totals', 'ratings'));

        return $pdf->stream('evaluation.pdf');
    }
}
