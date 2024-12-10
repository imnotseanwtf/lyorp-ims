<?php

namespace App\Http\Controllers;

use App\Models\ActivityRequest;
use Illuminate\Http\Request;

class CancelController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ActivityRequest $activity)
    {
        $activity->update(
            [
                'reason' => request()->input('reason'),
                'activity_status' => 3,
                'status' => 4,
            ]
        );

        alert()->success('Activity is Cancel!');

        return redirect()->route('activity-request.index');
    }
}
