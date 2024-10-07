<?php

namespace App\Http\Controllers;

use App\Models\EvaluationAnswer;
use App\Models\EvaluationAssignToAnswer;
use Illuminate\Http\Request;

class UserAnsweredQuestion extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $assign = EvaluationAssignToAnswer::findOrFail($id);

        $evaluationAnswers = EvaluationAnswer::where('evaluation_assign_to_answer_id', $id)
            ->with('question')
            ->get();

        return view('answers.index', compact('evaluationAnswers', 'assign'));
    }
}
