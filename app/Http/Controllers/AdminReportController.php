<?php

namespace App\Http\Controllers;

use App\DataTables\AdminReportDataTable;
use App\Models\Folder;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminReportDataTable $adminReportDataTable)
    {
        $folder_id = request()->query('folder_id');

        Report::where('folder_id', $folder_id)->update([
            'is_notif' => true
        ]);

        return $adminReportDataTable->render('admin-report.index', compact('folder_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report): JsonResponse | View
    {
        return response()->json($report);
    }
}
