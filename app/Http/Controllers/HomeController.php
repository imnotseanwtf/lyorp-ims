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

        $pendingOrganization = User::where('status', null)
            ->role('organization')
            ->count();

        $evaluationPending = AssignToAnswer::where('user_id', $userId)
            ->where('is_answered', false)
            ->count();

        $certificateRecieved = Certificate::where('user_id', $userId)->count();

        $announcementCount = Announcement::count();

        $announcements = Announcement::where('announce_on', '<=', Carbon::today())
            ->where('end_on', '>=', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->get();


        $reportCount = Report::count();

        return view('home', compact('approvedOrganization', 'pendingOrganization', 'announcementCount', 'reportCount', 'reportSent', 'certificateRecieved', 'announcements', 'evaluationPending'));
    }
}
