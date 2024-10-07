<?php

namespace App\Http\Controllers;

use App\DataTables\UserReportDataTable;
use App\Http\Requests\Report\StoreReportRequest;
use App\Http\Requests\Report\UpdateReportRequest;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserReportDataTable $userReportDataTable): JsonResponse | View
    {
        return $userReportDataTable->render('user-report.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $storeReportRequest): RedirectResponse
    {
        $userId = auth()->id();

        Report::create($storeReportRequest->except('file') +
            [
                'user_id' => $userId,
                'file' => $storeReportRequest->file('file')->store('userReports', 'public')
            ]);

        alert()->success('Report Submitted Successfully!');

        return redirect()->route('user-report.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report): JsonResponse | View
    {
        return response()->json($report);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $updateReportRequest, Report $report): RedirectResponse
    {
        $report->update($updateReportRequest->validated());

        alert()->success('Report Updated Successfully!');

        return redirect()->route('user-report');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report): RedirectResponse
    {
        $report->delete();

        alert()->success('Report Deleted Successfully!');

        return redirect()->route('user-report');
    }
}
