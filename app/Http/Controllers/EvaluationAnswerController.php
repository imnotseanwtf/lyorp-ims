<?php

namespace App\Http\Controllers;

use App\Http\Requests\Evaluation\StoreEvaluationAnswerRequest;
use App\Models\EvaluationAnswer;
use App\Models\EvaluationAssignToAnswer;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EvaluationAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assign = EvaluationAssignToAnswer::where('user_id', auth()->user()->id)
            ->with('criteria.questions')
            ->get();

        return view('evaluation-org.index', compact('assign'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationAnswerRequest $storeEvaluationAnswerRequest): RedirectResponse
    {
        $assignToAnswer = EvaluationAssignToAnswer::find($storeEvaluationAnswerRequest->assign_id);

        $assignToAnswer->update(
            [
                'is_answered' => true
            ]
        );

        foreach ($storeEvaluationAnswerRequest->validated()['ratings'] as $questionId => $rating) {
            EvaluationAnswer::create(
                    [
                        'answer' => $rating,
                        'evaluation_assign_to_answer_id' => $assignToAnswer->id,
                        'question_id' => $questionId,
                    ]
            );
        }

        alert()->success('Rating Has Submitted Successfully!');

        return redirect()->route('evaluation.index');
    }
}
