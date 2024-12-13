<?php

namespace App\Http\Controllers;

use App\DataTables\ProgressUpdateDataTable;
use App\Http\Requests\StoreProgressUpdate;
use App\Http\Requests\UpdateProgressUpdate;
use App\Models\ActivityRequest;
use App\Models\ProgressUpdate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ProgressUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProgressUpdateDataTable $progressUpdateDataTable)
    {
        $activity_request_id = array_key_first(request()->query());

        $activity = ActivityRequest::findOrFail($activity_request_id);

        return $progressUpdateDataTable->render('progress.index', compact('activity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgressUpdate $storeProgressUpdate): RedirectResponse
    {
        $validatedData = $storeProgressUpdate->validated();

        // Check if a file is present and store it in the public directory
        if (request()->hasFile('file')) {
            $validatedData['file'] = request()->file('file')->store('progress_updates', 'public');
        }

        $progress = ProgressUpdate::create($validatedData);

        alert()->success('Progress Stored Successfully!');

        return redirect()->route('progress.index', $progress->activity_request_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProgressUpdate $progress): JsonResponse | View
    {
        return response()->json($progress);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgressUpdate $updateProgressUpdate, ProgressUpdate $progress): RedirectResponse
    {
        $validatedData = $updateProgressUpdate->validated();

        // Check if a file is present and store it in the public directory
        if (request()->hasFile('file')) {
            $validatedData['file'] = request()->file('file')->store('progress_updates', 'public');
        }

        $progress->update($validatedData);

        alert()->success('Progress Updated Successfully!');

        return redirect()->route('progress.index', $progress->activity_request_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgressUpdate $progress)
    {
        $activity_request_id = $progress->activity_request_id;

        $progress->delete();

        return redirect()->route('progress.index', $activity_request_id);
    }
}
