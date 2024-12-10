<?php

namespace App\Http\Controllers;

use App\DataTables\OngoingActivityDataTable;
use Illuminate\Http\Request;

class OngoingActivityController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(OngoingActivityDataTable $ongoingActivityDataTable)
    {
        return $ongoingActivityDataTable->render('ongoing.index');
    }
}
