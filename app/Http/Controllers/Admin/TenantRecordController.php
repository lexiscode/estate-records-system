<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Remittance;
use PDF;


class TenantRecordController extends Controller
{
    // permissions management
    public function __construct()
    {
        $this->middleware('role_or_permission:statement create,web')->only('create');
        $this->middleware('role_or_permission:statement generatePDF,web')->only('generatePDF');
    }

    /**
     * Display a listing of the resource.
    */
    public function index()
    {
    $all_tenant = Remittance::distinct('tenant_name')->pluck('tenant_name');
    $all_apartment = Remittance::distinct('apartment')->pluck('apartment');

    return view('web.backend.tenant-records.index', compact('all_tenant', 'all_apartment'));
    }


    /**
     * Show the form for creating a new resource.
    */
    public function create(Request $request)
    {
        //dd($request->all());
        // Get the selected tenant name and apartment from the form submission
        $selectedTenantNames = $request->input('name_of_tenant');
        $selectedApartments = $request->input('name_of_apartment');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Remittance::query();

        // Filter records based on selected tenant names and apartments
        if (!empty($selectedTenantNames)) {
            if (is_array($selectedTenantNames)) {
                $query->whereIn('tenant_name', $selectedTenantNames);
            } else {
                $query->where('tenant_name', $selectedTenantNames);
            }
        }

        if (!empty($selectedApartments)) {
            if (is_array($selectedApartments)) {
                $query->whereIn('apartment', $selectedApartments);
            } else {
                $query->where('apartment', $selectedApartments);
            }
        }

        // Filter records based on the date range
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('rent_due_date', [$startDate, $endDate]);
        }

        // Get the filtered records
        $filteredRecords = $query->orderBy('created_at', 'asc')->simplePaginate(5);

        return view('web.backend.tenant-records.create', compact('filteredRecords', 'selectedTenantNames', 'selectedApartments'));
    }


    /**
     * Generates PDF
    */
    public function generatePDF(Request $request)
    {
        // Retrieve the selected tenant names and apartments
        $selectedTenantNames = $request->input('name_of_tenant');
        $selectedApartments = $request->input('name_of_apartment');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = Remittance::query();

        // Filter records based on selected tenant names and apartments
        if (!empty($selectedTenantNames)) {
            if (is_array($selectedTenantNames)) {
                $query->whereIn('tenant_name', $selectedTenantNames);
            } else {
                $query->where('tenant_name', $selectedTenantNames);
            }
        }

        if (!empty($selectedApartments)) {
            if (is_array($selectedApartments)) {
                $query->whereIn('apartment', $selectedApartments);
            } else {
                $query->where('apartment', $selectedApartments);
            }
        }

        // Filter records based on the date range
        if (!empty($startDate) && !empty($endDate)) {
            $query->whereBetween('rent_due_date', [$startDate, $endDate]);
        }

        // Get the filtered records
        $filteredRecords = $query->orderBy('created_at', 'asc')->get();

        // Calculate the totals for Amount Paid and Debt Amount
        $totalAmountPaid = $filteredRecords->sum('amount_paid');
        $totalDebtAmount = $filteredRecords->sum('debt_amount');
        $rentFee = $filteredRecords->first()->rent_fee;

        // Generate the PDF using the PDF facade
        $pdf = PDF::loadView('web.backend.tenant-records.exports.pdf_view', compact('filteredRecords',
        'selectedTenantNames', 'selectedApartments', 'totalAmountPaid', 'totalDebtAmount', 'rentFee'));

        // Download the PDF file with a specific filename
        return $pdf->download("$selectedTenantNames-RentStatements.pdf");
    }

}


