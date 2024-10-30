<?php

namespace App\Http\Controllers;

use App\DataTables\ArchiveReportDataTable;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArchiveReportDataTable $archiveReportDataTable): JsonResponse | View
    {
        $folderId = array_key_first(request()->query());

        return $archiveReportDataTable->render('archive.index', compact('folderId'));
    }

    public function show(Report $report): JsonResponse | View
    {
        return response()->json($report);
    }
}
