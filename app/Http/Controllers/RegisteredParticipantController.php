<?php

namespace App\Http\Controllers;

use App\DataTables\RegisteredParticipantDataTable;
use App\Http\Requests\StoreRegisteredParticipant;
use App\Http\Requests\UpdateRegisteredParticipant;
use App\Models\ActivityRequest;
use App\Models\RegisteredParticipant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegisteredParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = array_key_first(request()->query());

        $activityRequest = ActivityRequest::findOrFail($id);

        $registeredParticipantDataTable = new RegisteredParticipantDataTable($id);

        return $registeredParticipantDataTable->render('registeredParticipant.index', compact('activityRequest'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegisteredParticipant $storeRegisteredParticipant): RedirectResponse
    {
        $register = RegisteredParticipant::create($storeRegisteredParticipant->validated());

        alert()->success('Registered Successfully!');

        return redirect()->route('registered.index', $register->activity_request_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(RegisteredParticipant $registered): JsonResponse
    {
        return response()->json($registered);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegisteredParticipant $updateRegisteredParticipant, RegisteredParticipant $registered)
    {
        $registered->update($updateRegisteredParticipant->validated());

        alert()->success('Registered Updated Successfully!');

        return redirect()->route('registered.index', $registered->activity_request_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegisteredParticipant $registered)
    {
        $activityId = $registered->activity_request_id;
        
        $registered->delete();

        alert()->success('Registered Deleted Successfully!');

        return redirect()->route('registered.index', $activityId);
    }
}
