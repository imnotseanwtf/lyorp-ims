<?php

namespace App\Http\Controllers;

use App\Http\Requests\Certificate\UpdateCertificateRequest;
use App\Models\CertificateImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CertificateImageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateCertificateRequest $updateCertificateRequest): RedirectResponse
    {
        // Find the certificate by ID (assuming it exists)
        $certificate = CertificateImage::find(1);

        // Prepare an array for the fields to be updated
        $updateData = $updateCertificateRequest->except('left_logo', 'right_logo', 'left_signiture', 'right_signiture', 'middle_signiture');

        // Check each file and add it to the array if it exists
        if ($updateCertificateRequest->hasFile('left_logo')) {
            $updateData['left_logo'] = $updateCertificateRequest->file('left_logo')->store('certificateImages', 'public');
        }
        if ($updateCertificateRequest->hasFile('right_logo')) {
            $updateData['right_logo'] = $updateCertificateRequest->file('right_logo')->store('certificateImages', 'public');
        }
        if ($updateCertificateRequest->hasFile('left_signiture')) {
            $updateData['left_signiture'] = $updateCertificateRequest->file('left_signiture')->store('certificateImages', 'public');
        }
        if ($updateCertificateRequest->hasFile('right_signiture')) {
            $updateData['right_signiture'] = $updateCertificateRequest->file('right_signiture')->store('certificateImages', 'public');
        }
        if ($updateCertificateRequest->hasFile('middle_signiture')) {
            $updateData['middle_signiture'] = $updateCertificateRequest->file('middle_signiture')->store('certificateImages', 'public');
        }

        // Update the certificate with the filtered data
        $certificate->update($updateData);

        alert()->success('Certificate Updated Successfully!');

        return redirect()->route('certificate.index');
    }
}
