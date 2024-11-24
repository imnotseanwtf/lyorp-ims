<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AssignToAnswer;
use App\Models\Certificate;
use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $userId = auth()->id();

        $reportSent = Report::where('user_id', $userId)->count();;

        $approvedOrganization = User::where('status', true)
            ->role('organization')
            ->count();

        $pendingOrganization = User::where('status', 0)
            ->role('organization')
            ->count();

        $evaluationPending = AssignToAnswer::where('user_id', $userId)
            ->where('is_answered', false)
            ->count();

        $certificateRecieved = Certificate::where('user_id', $userId)->count();

        $announcementCount = Announcement::count();

        $announcements = Announcement::whereDate('announce_on', '<=', Carbon::today())  // announce_on is on or before today
            ->where(function ($query) {
                $query->whereDate('end_on', '>=', Carbon::today())  // end_on is on or after today
                    ->orWhereNull('end_on');  // Or end_on is null
            })
            ->orderBy('created_at', 'desc')  // Sort by created_at descending
            ->get();

        $reportCount = Report::count();

        return view('home', compact('approvedOrganization', 'pendingOrganization', 'announcementCount', 'reportCount', 'reportSent', 'certificateRecieved', 'announcements', 'evaluationPending'));
    }
}
