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
        $userId = auth()->id();

        $assignToAnswer = EvaluationAssignToAnswer::find($storeEvaluationAnswerRequest->assign_id);

        $assignToAnswer->update(
            [
                'is_answered' => true
            ]
        );

        foreach ($storeEvaluationAnswerRequest->validated()['ratings'] as $questionId => $rating) {
            EvaluationAnswer::create(
                $storeEvaluationAnswerRequest->only(['criteria_id'])
                    +
                    [
                        'answer' => $rating,
                        'user_id' => $userId,
                        'question_id' => $questionId,
                    ]
            );
        }

        alert()->success('Rating Has Submitted Successfully!');

        return redirect()->route('evaluation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
