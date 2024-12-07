<?php

namespace App\Http\Controllers\ReportAction;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ViewRejectReportController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Report $report): RedirectResponse
    {
        $report->update(
            [
                'status_report' => 2,
                'reason' => request()->input('reason')
            ]
        );

        alert()->success('Report Rejected Successfully!');

        return redirect()->route('view-report.index', $report->user_id);
    }
}
