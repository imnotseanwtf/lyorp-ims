<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\CertificateImage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class CertificatePdfController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Certificate $certificate)
    {
        $certificateImage = CertificateImage::find(1);

        $pdf = Pdf::loadView('certificate.pdf', compact('certificate', 'certificateImage'));

        return $pdf->stream('certicate.pdf');
    }
}
