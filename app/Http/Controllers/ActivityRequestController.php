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
use Illuminate\Support\Facades\Storage;

class ActivityRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ActivityRequestDataTable $activityRequestDataTable)
    {
        if (auth()->user()->isAdmin()) {
            ActivityRequest::query()->update(['is_notif' => true]);
        }

        return $activityRequestDataTable->render('activity-request.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $storeActivityRequest): RedirectResponse
    {
        ActivityRequest::create(
            $storeActivityRequest->except(['file', 'topics', 'equipment', 'audience'])
                + [
                    'file' => $storeActivityRequest->file('file')->store('activityRequest', 'public'),
                    'user_id' => auth()->id(),
                    'topics' => json_encode($storeActivityRequest->topics),
                    'equipment' => json_encode($storeActivityRequest->equipment),
                    'audience' => json_encode($storeActivityRequest->audience),
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
        // Prepare data, encoding arrays for JSON storage
        $data = array_merge(
            $updateActivityRequest->except(['file', 'topics', 'equipment', 'audience']),
            [
                'topics' => json_encode($updateActivityRequest->topics),
                'equipment' => json_encode($updateActivityRequest->equipment),
                'audience' => json_encode($updateActivityRequest->audience),
            ]
        );

        // Handle file upload if present
        if ($updateActivityRequest->hasFile('file')) {
            // Delete old file if it exists
            if ($activity->file) {
                Storage::disk('public')->delete($activity->file);
            }
            // Store the new file
            $data['file'] = $updateActivityRequest->file('file')->store('activityRequest', 'public');
        }

        // Update the activity with new data
        $activity->update($data);

        // Provide success feedback
        alert()->success('Activity Request Updated Successfully!');

        // Redirect to the activity request index
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
