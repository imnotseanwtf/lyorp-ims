<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AssignToAnswer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfEvaluationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $answers = Answer::whereHas('assignToAnswer', function ($query) {
            $query->where('user_id', auth()->id())
                ->where('is_answered', 1);
        })
            ->with('question')
            ->get();

        $pdf = Pdf::loadView('evaluation.pdf', compact('answers'));

        return $pdf->stream('evaluation.pdf');
    }
}
