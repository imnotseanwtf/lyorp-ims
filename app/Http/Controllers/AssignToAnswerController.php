<?php

namespace App\Http\Controllers;

use App\DataTables\AssignToAnswerDataTable;
use App\Http\Requests\StoreAssignToAnswerRequest;
use App\Models\Answer;
use App\Models\AssignToAnswer;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AssignToAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AssignToAnswerDataTable $assignToAnswerDataTable)
    {
        // Get the first criteria_id from the request query
        $criteriaId = array_key_first(request()->query());

        $assignId = AssignToAnswer::where('criteria_id', $criteriaId)->first()->id ?? null;

        // Fetch organizations that do not have the given criteria in EvaluationAssignToAnswer
        $organizations = User::whereHas('roles', function ($q) {
            $q->where('name', 'organization');
        })
            ->whereDoesntHave('assignToAnswer', function ($q) use ($criteriaId) {
                $q->where('criteria_id', $criteriaId);
            })
            ->select('id', 'name')
            ->get();

        Answer::where('assign_to_answer_id', $assignId)
            ->update(['is_notif' => true]) ?? null;

        return $assignToAnswerDataTable->render('assignToAnswer.index', compact('organizations', 'criteriaId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAssignToAnswerRequest $storeAssignToAnswerRequest): RedirectResponse
    {
        $assign = AssignToAnswer::create($storeAssignToAnswerRequest->except(['user_id'])
            +
            [
                'user_id' => $storeAssignToAnswerRequest->user_id ?? User::role('admin')->first()->id,
            ]);

        alert()->success('The User Added Successfully!');

        return redirect()->route('assign-answer.index', $assign->criteria_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignToAnswer $assign): JsonResponse | View
    {
        return response()->json($assign);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignToAnswer $assign): RedirectResponse
    {
        $assignId = $assign->critera_id;

        $assign->delete();

        alert()->success('Organization Deleted Successfully!');

        return redirect()->route('assign-answer.index', $assignId);
    }
}
