<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ResubmitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Report $report)
    {
        $report->update(
            [
                'status_report' => 0,
            ]
        );

        alert()->success('Report Submitted Sucessfully!');

        return redirect()->route('user-report.index', ['folder_id' => $report->folder_id]);
    }
}
