<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificatePdfController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Certificate $certificate)
    {
        $data = [
            'organizationName' => $certificate->user->name,
        ];

        $pdf = Pdf::loadView('certificate.pdf', $data);

        return $pdf->stream('certicate');
    }
}
