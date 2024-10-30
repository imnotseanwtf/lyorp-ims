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
        })
            ->whereDoesntHave('certificates')
            ->where('status', 1)
            ->get();

        return $certificateDataTable->render('certificate.index', compact('organizations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCertificateRequest $storeCertificateRequest): RedirectResponse
    {
        Certificate::create($storeCertificateRequest->validated());

        alert()->success('Certificate Created Successfully!');

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
