<?php

namespace App\Http\Controllers;

use App\DataTables\ViewEvaluationDataTable;
use App\Models\AssignToAnswer;
use Illuminate\Http\Request;

class ViewUserEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ViewEvaluationDataTable $viewEvaluationDataTable)
    {
        return $viewEvaluationDataTable->render('viewEvaluation.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AssignToAnswer $assignToAnswer)
    {
        return response()->json($assignToAnswer);
    }
}