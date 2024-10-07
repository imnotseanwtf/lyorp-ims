<?php

namespace App\Http\Controllers;

use App\DataTables\CriteriaDataTable;
use App\Http\Requests\Criteria\StoreCriteriaRequest;
use App\Http\Requests\Criteria\UpdateCriteriaRequest;
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
    public function index(CriteriaDataTable $criteriaDataTable): JsonResponse | View
    {
        return $criteriaDataTable->render('criteria.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCriteriaRequest $storeCriteriaRequest): RedirectResponse
    {
        Criteria::create($storeCriteriaRequest->validated());

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
