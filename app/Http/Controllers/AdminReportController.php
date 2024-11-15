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
        $folderId = array_key_first(request()->query());

        Report::where('folder_id', $folderId)->update([
            'is_notif' => true
        ]);

        return $adminReportDataTable->render('admin-report.index', compact('folderId'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report): JsonResponse | View
    {
        return response()->json($report);
    }
}
