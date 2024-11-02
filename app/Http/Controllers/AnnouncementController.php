<?php

namespace App\Http\Controllers;

use App\DataTables\AnnouncementDataTable;
use App\Http\Requests\Announcement\StoreAnnoucementRequest;
use App\Http\Requests\Announcement\UpdateAnnoucementRequest;
use App\Models\Announcement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AnnouncementDataTable $announcementDataTable)
    {
        return $announcementDataTable->render('announcement.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnnoucementRequest $storeAnnoucementRequest): RedirectResponse
    {
        $announcement = Announcement::create($storeAnnoucementRequest->validated());

        alert()->success('Announcement Created Successfully!');

        return redirect()->route('announcement.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcement $announcement): JsonResponse | View
    {
        return response()->json($announcement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnnoucementRequest $updateAnnoucementRequest, Announcement $announcement): RedirectResponse
    {
        $announcement->update($updateAnnoucementRequest->validated());

        alert()->success('Announcement Updated Successfully!');

        return redirect()->route('announcement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcement $announcement): RedirectResponse
    {
        $announcement->delete();

        alert()->success('Announcement Deleted Successfully!');

        return redirect()->route('announcement.index');
    }
}
