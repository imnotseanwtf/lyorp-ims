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

        return view('answers.index', compact('answers', 'assign'));
    }
}
