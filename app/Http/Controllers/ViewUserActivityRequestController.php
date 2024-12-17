<?php

namespace App\Http\Controllers;

use App\DataTables\ViewActivityRequestDataTable;
use App\Models\ActivityRequest;
use Illuminate\Http\Request;

class ViewUserActivityRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewActivityRequestDataTable $viewActivityRequestDataTable)
    {
        ActivityRequest::where('user_id', array_key_first(request()->query()))
            ->update(['is_notif' => true]);


        return $viewActivityRequestDataTable->render('viewActivityRequest.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}
}
