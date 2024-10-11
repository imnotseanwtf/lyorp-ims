<?php

namespace App\Http\Controllers\ActivityRequestAction;

use App\Http\Controllers\Controller;
use App\Models\ActivityRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RejectActivityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ActivityRequest $activity): RedirectResponse
    {
        $activity->update(
            [
                'status' => 2,
            ]
        );

        alert()->success('Activity Request Rejected Succesfully!');

        return redirect()->route('activity-request.index');
    }
}
