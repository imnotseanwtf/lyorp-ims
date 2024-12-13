<?php

namespace App\Http\Controllers;

use App\Models\ActivityRequest;
use Illuminate\Http\Request;

class DoneController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ActivityRequest $activity)
    {
        $activity->update(
            [
                'activity_status' => 3,
                'status' => 3,
            ]
        );

        alert()->success('Activity is Done!');

        return redirect()->route('activity-request.index');
    }
}
