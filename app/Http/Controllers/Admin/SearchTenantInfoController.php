<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;

class SearchTenantInfoController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $tenants_search = Tenant::where('tenant_name', 'like', "%$query%")
            ->orWhere('apartment', 'like', "%$query%")
            ->get();

        return view('web.backend.remittance.search', compact('tenants_search'));
    }
}
