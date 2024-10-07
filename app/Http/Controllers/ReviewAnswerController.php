<?php

namespace App\Http\Controllers;

use App\DataTables\ReviewAnswersDataTable;
use App\Http\Requests\StoreAssignToAnswerRequest;
use App\Models\EvaluationAssignToAnswer;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ReviewAnswersDataTable $reviewAnswersDataTable): JsonResponse | View
    {
        // Get the first criteria_id from the request query
        $criteriaId = array_key_first(request()->query());

        // Fetch organizations that do not have the given criteria in EvaluationAssignToAnswer
        $organizations = User::whereHas('roles', function ($q) {
            $q->where('name', 'organization');
        })
            ->whereDoesntHave('evaluationAssignToAnswers', function ($q) use ($criteriaId) {
                $q->where('criteria_id', $criteriaId);
            })
            ->select('id', 'name')
            ->get();

        // Render the data table view with the organizations and criteria ID
        return $reviewAnswersDataTable->render('review-answer.index', compact('organizations', 'criteriaId'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignToAnswerRequest $storeAssignToAnswerRequest): RedirectResponse
    {
        $assign = EvaluationAssignToAnswer::create($storeAssignToAnswerRequest->validated());

        alert()->success('Evaluation Added Successfully!');

        return redirect()->route('review.index', $assign->criteria_id);
    }

    /** 
     * Display the specified resource.
     */
    public function show(EvaluationAssignToAnswer $evaluationAssignToAnswer): JsonResponse | View
    {
        return response()->json($evaluationAssignToAnswer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EvaluationAssignToAnswer $evaluationAssignToAnswer): RedirectResponse
    {
        $criteriaId = $evaluationAssignToAnswer->criteria_id;

        $evaluationAssignToAnswer->delete();

        alert()->success('Evaluation Deleted Successfully!');

        return redirect()->route('review', $criteriaId);
    }
}
