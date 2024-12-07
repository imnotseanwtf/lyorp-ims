<?php

namespace App\Http\Controllers;

use App\DataTables\ViewActivityRequestDataTable;
use Illuminate\Http\Request;

class ViewUserActivityRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewActivityRequestDataTable $viewActivityRequestDataTable)
    {
        return $viewActivityRequestDataTable->render('viewActivityRequest.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }
    
}
