<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchSpecificTenantHistoryController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $tenants_history_search = Tenant::where('tenant_name', 'like', "%$query%")
            ->orWhere('apartment', 'like', "%$query%")
            ->get();

        return view('web.backend.specific-tenant-history.search', compact('tenants_history_search'));
    }
}

