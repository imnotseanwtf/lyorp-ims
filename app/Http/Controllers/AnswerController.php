<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Models\Answer;
use App\Models\AssignToAnswer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assign = AssignToAnswer::where('user_id', auth()->id())
            ->with('criteria.questions')
            ->get();

        return view('evaluation.index', compact('assign'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnswerRequest $storeAnswerRequest): RedirectResponse
    {
        $assignToAnswer = AssignToAnswer::find($storeAnswerRequest->assign_id);

        $assignToAnswer->update(
            [
                'is_answered' => true
            ]
        );

        foreach ($storeAnswerRequest->validated()['ratings'] as $questionId => $rating) {
            Answer::create(
                [
                    'answer' => $rating,
                    'assign_to_answer_id' => $assignToAnswer->id,
                    'question_id' => $questionId,
                ]
            );
        }

        alert()->success('Rating Has Submitted Successfully!');

        return redirect()->route('evaluation.index');
    }
}
