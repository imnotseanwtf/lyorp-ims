<?php

namespace App\Http\Controllers\ReportAction;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SoftDeleteReportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Report $report): RedirectResponse
    {
        $report->update(
            [
                'status' => false,
            ]
        );

        alert()->success('Report Deleted Successfully!');

        return redirect()->route('user-report.index');
    }
}
