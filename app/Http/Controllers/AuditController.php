<?php

namespace App\Http\Controllers;

use App\DataTables\AuditDataTable;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuditDataTable $auditDataTable)
    {
        return $auditDataTable->render('audit.index');
    }
}
