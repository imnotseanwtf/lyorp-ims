<?php

namespace App\Http\Controllers;

use App\DataTables\ViewReportDataTable;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ViewUserReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewReportDataTable $viewReportDataTable)
    {
        $folder_id = array_key_first(request()->query());

        Report::where('user_id', $folder_id)->update([
            'is_notif' => true
        ]);

        return $viewReportDataTable->render('viewReport.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report): JsonResponse | View
    {
        return response()->json($report);
    }
}
