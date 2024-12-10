<?php

namespace App\Http\Controllers;

use App\Models\ActivityRequest;
use Illuminate\Http\Request;

class DoneController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ActivityRequest $activityRequest)
    {
        $activityRequest->update(
            [
                'activity_status' => 2,
                'status' => 3,
            ]
        );

        alert()->success('Activity is Done!');

        return redirect()->route('activity-request.index');
    }
}
