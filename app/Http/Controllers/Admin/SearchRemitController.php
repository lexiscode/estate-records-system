<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Remittance;

class SearchRemitController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $remits_search = Remittance::where('tenant_name', 'like', "%$query%")
            ->orWhere('apartment', 'like', "%$query%")
            ->get();

        return view('web.backend.remittance.search', compact('remits_search'));
    }
}
