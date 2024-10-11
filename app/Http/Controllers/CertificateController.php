<?php

namespace App\Http\Controllers;

use App\DataTables\CertificateDataTable;
use App\Http\Requests\Certificate\StoreCertificateRequest;
use App\Http\Requests\Certificate\UpdateCertificateRequest;
use App\Models\Certificate;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CertificateDataTable $certificateDataTable): JsonResponse | View
    {
        $organizations = User::whereHas('roles', function ($q) {
            $q->where('name', 'organization');
        })->get();
        
        return $certificateDataTable->render('certificate.index', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificateRequest $storeCertificateRequest): RedirectResponse
    {
        Certificate::create(
            $storeCertificateRequest->except('file')
                + [
                    'file' => $storeCertificateRequest->file('file')->store('organizationCertificate', 'public'),
                ]
        );

        alert()->success('Certificate Created Successfully!');

        return redirect()->route('certificate.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate): JsonResponse | View
    {
        return response()->json($certificate);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCertificateRequest $updateCertificateRequest, Certificate $certificate): RedirectResponse
    {
        $data = $updateCertificateRequest->except('file');

        if ($updateCertificateRequest->hasFile('file')) {
            $data['file'] = $updateCertificateRequest->file('file')->store('organizationCertificate', 'public'); // Adjust storage path as needed
        }

        $certificate->update($data);

        alert()->success('Certificate Updated Successfully!');

        return redirect()->route('certificate.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate): RedirectResponse
    {
        $certificate->delete();

        alert()->success('Certificate Deleted Successfully!');

        return redirect()->route('certificate.index');
    }
}
