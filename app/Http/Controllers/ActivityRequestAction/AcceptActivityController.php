<?php

namespace App\Http\Controllers\ActivityRequestAction;

use App\Http\Controllers\Controller;
use App\Models\ActivityRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AcceptActivityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ActivityRequest $activity): RedirectResponse
    {
        $activity->update(
            [
                'status' => 1,
                'activity_status' => 1,
            ]
        );

        alert()->success('Activity Request Accepted Succesfully!');

        return redirect()->route('activity-request.index');
    }
}
