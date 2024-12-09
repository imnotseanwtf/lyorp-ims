<?php

namespace App\Http\Controllers;

use App\DataTables\CriteriaDataTable;
use App\Http\Requests\Criteria\StoreCriteriaRequest;
use App\Http\Requests\Criteria\UpdateCriteriaRequest;
use App\Models\ActivityRequest;
use App\Models\AssignToAnswer;
use App\Models\Criteria;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CriteriaDataTable $criteriaDataTable)
    {
        $user = auth()->user();

        if ($user->isOrganization()) {
            $activity_request = ActivityRequest::where('status', 1)
                ->where('user_id', $user->id)
                ->whereNotIn('id', function ($query) {
                    $query->select('activity_request_id')
                        ->from('criterias')
                        ->where('user_id', auth()->id());
                })
                ->get();
        } else {
            $activity_request = ActivityRequest::where('status', 1)
                ->whereNotIn('id', function ($query) {
                    $query->select('activity_request_id')
                        ->from('criterias')
                        ->where('user_id', auth()->id());
                })
                ->get();
        }

        return $criteriaDataTable->render('criteria.index',  compact('activity_request'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCriteriaRequest $storeCriteriaRequest)
    {
        $criteria =  Criteria::create(
            $storeCriteriaRequest->validated()
                +
                [
                    'user_id' => auth()->id()
                ]
        );

        $user = auth()->user();

        if ($user->isOrganization()) {
            $user_id = User::role('admin')->first()->id;
        } else {
            $user_id = ActivityRequest::where('id', $criteria->activity_request_id)->firstOrFail()->user_id;
        }

        AssignToAnswer::create(
            [
                'criteria_id' => $criteria->id,
                'user_id' => $user_id,
                'assign_user_id' => auth()->id(),
            ]
        );

        alert()->success('Criteria Created Successfully!');

        return redirect()->route('criteria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Criteria $criteria): JsonResponse | View
    {
        return response()->json($criteria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCriteriaRequest $updateCriteriaRequest, Criteria $criteria): RedirectResponse
    {
        $criteria->update($updateCriteriaRequest->validated());

        alert()->success('Criteria Updated Successfully!');

        return redirect()->route('criteria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Criteria $criteria): RedirectResponse
    {
        $criteria->delete();

        alert()->success('Criteria Deleted Successfully!');

        return redirect()->route('criteria.index');
    }
}
