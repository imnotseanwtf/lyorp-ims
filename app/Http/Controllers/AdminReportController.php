<?php

namespace App\Http\Controllers;

use App\DataTables\AdminReportDataTable;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AdminReportDataTable $adminReportDataTable): JsonResponse | View
    {
        return $adminReportDataTable->render('admin-report.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report): JsonResponse | View
    {
        return response()->json($report);
    }
    
}
