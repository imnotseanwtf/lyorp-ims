<?php

namespace App\Http\Controllers;

use App\Models\ActivityRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(ActivityRequest $activity)
    {
        $activity->update(
            [
                'comment' => request()->input('comment'),
            ]
        );

        alert()->success('Comment Sent Successfully!');

        return redirect()->route('activity-request.index');
    }
}
