<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignToAnswerRequest;
use App\Models\EvaluationAssignToAnswer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AssignToAnswerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreAssignToAnswerRequest $storeAssignToAnswerRequest): RedirectResponse
    {
        EvaluationAssignToAnswer::create($storeAssignToAnswerRequest->validated());

        alert()->success('Evaluation Added Successfully!');

        return redirect()->route('criteria.index');
    }
}
