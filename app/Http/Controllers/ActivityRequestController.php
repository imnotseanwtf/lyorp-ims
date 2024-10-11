<?php

namespace App\Http\Controllers;

use App\DataTables\ActivityRequestDataTable;
use App\Http\Requests\Activity\StoreActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Models\ActivityRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ActivityRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ActivityRequestDataTable $activityRequestDataTable): JsonResponse | View
    {
        return $activityRequestDataTable->render('activity-request.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $storeActivityRequest): RedirectResponse
    {
        ActivityRequest::create(
            $storeActivityRequest->except('file')
                + [
                    'file' => $storeActivityRequest->file('file')->store('activityRequest', 'public'),
                    'user_id' => auth()->id(),
                ]
        );

        alert()->success('Activity Requested Successfully!');

        return redirect()->route('activity-request.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ActivityRequest $activity): JsonResponse | View
    {
        return response()->json($activity);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityRequest $updateActivityRequest, ActivityRequest $activity): RedirectResponse
    {
        $data = $updateActivityRequest->except('file');

        if ($updateActivityRequest->hasFile('file')) {
            $data['file'] = $updateActivityRequest->file('file')->store('activityRequest', 'public'); // Adjust storage path as needed
        }

        $activity->update($data);

        alert()->success('Activity Request Updated Successfully!');

        return redirect()->route('activity-request.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityRequest $activity): RedirectResponse
    {
        $activity->delete();

        alert()->success('Activity Request Deleted Successfully!');

        return redirect()->route('activity-request.index');
    }
}
