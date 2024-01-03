<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SpecificTenantHistoryController extends Controller
{
    public function index()
    {
        $tenants = Tenant::with('remittance', 'service_charge')->simplePaginate(5);

        return view('web.backend.specific-tenant-history.index', compact('tenants'));
    }

    public function show()
    {

    }

}

