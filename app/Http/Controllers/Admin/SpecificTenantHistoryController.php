<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SpecificTenantHistoryController extends Controller
{
    
    public function index()
    {
        $tenants = Tenant::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('web.backend.specific-tenant-history.index', compact('tenants'));
    }

    public function show(string $id)
    {

        $tenant = Tenant::with('remittance', 'service_charge')->findOrFail($id);

        return view('web.backend.specific-tenant-history.show', compact('tenant'));
    }

}

