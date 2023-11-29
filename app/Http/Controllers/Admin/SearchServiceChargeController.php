<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCharge;

class SearchServiceChargeController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $service_charge_search = ServiceCharge::where('tenant_name', 'like', "%$query%")
            ->orWhere('apartment', 'like', "%$query%")
            ->get();

        return view('web.backend.service-charge.search', compact('service_charge_search'));
    }
}
