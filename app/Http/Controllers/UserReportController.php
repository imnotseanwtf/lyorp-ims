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
    public function index(UserReportDataTable $userReportDataTable)
    {
        $folderId = array_key_first(request()->query());

        return $userReportDataTable->render('user-report.index', compact('folderId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $storeReportRequest): RedirectResponse
    {
        $userId = auth()->id();

        $report = Report::create($storeReportRequest->except('file') +
            [
                'user_id' => $userId,
                'file' => $storeReportRequest->file('file')->store('userReports', 'public')
            ]);

        alert()->success('Report Submitted Successfully!');

        return redirect()->route('user-report.index', $report->folder_id);
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
        $data = $updateReportRequest->except('file');

        if ($updateReportRequest->hasFile('file')) {
            $data['file'] = $updateReportRequest->file('file')->store('userReports', 'public'); // Adjust storage path as needed
        }

        $report->update($data);

        alert()->success('Report Updated Successfully!');

        return redirect()->route('user-report.index', $report->folder_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report): RedirectResponse
    {
        $folderId = $report->folder_id;

        $report->delete();

        alert()->success('Report Deleted Successfully!');

        return redirect()->route('user-report.index', $folderId);
    }
}
