<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\Remittance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceCharge;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        // numbers of tenants
        $tenants = Tenant::get();

        // numbers of remittance
        $remittances = Remittance::get();

        // numbers of service charge
        $service_charges = ServiceCharge::get();

        // countdown
        $now = Carbon::now();
        $twoWeeksFromNow = $now->copy()->addWeeks(2);

        $countdowns = Remittance::whereBetween('rent_due_date', [$now, $twoWeeksFromNow])
            ->orderBy('rent_due_date')
            ->simplePaginate(5);

        // check overdue
        $overdues = Remittance::where('rent_due_date', '<', $now)
            ->orderBy('rent_due_date')
            ->simplePaginate(5);

        return view('web.backend.dashboard.index', compact('tenants', 'remittances', 'service_charges',
                    'countdowns', 'now', 'overdues'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}


