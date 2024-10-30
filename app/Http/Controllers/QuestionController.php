<?php

namespace App\Http\Controllers;

use App\DataTables\QuestionDataTable;
use App\Http\Requests\Question\StoreQuestionRequest;
use App\Http\Requests\Question\UpdateQuestionRequest;
use App\Models\Criteria;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(QuestionDataTable $questionDataTable): JsonResponse | View
    {
        $criteria = Criteria::find(array_key_first(request()->query()));
        $criteriaName = $criteria->name;
        $criteriaId = $criteria->id;

        return $questionDataTable->render('question.index', compact('criteriaId', 'criteriaName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $storeQuestionRequest): RedirectResponse
    {
        $question = Question::create(
            $storeQuestionRequest->validated()
                +
                [
                    'user_id' => auth()->id(),
                ]
        );

        alert()->success('Question Created Successfully!');

        return redirect()->route('question.index', $question->criteria_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question): JsonResponse | View
    {
        return response()->json($question);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuestionRequest $updateQuestionRequest, Question $question): RedirectResponse
    {
        $question->update($updateQuestionRequest->validated());

        alert()->success('Question Updated Successfully!');

        return redirect()->route('question.index', $question->criteria_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question): RedirectResponse
    {
        $question->delete();

        alert()->success('Question Deleted Successfully!');

        return redirect()->route('question.index', $question->criteria_id);
    }
}
