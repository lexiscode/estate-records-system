<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Http\Requests\TenantStoreRequest;
use App\Http\Requests\TenantUpdateRequest;

class TenantInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenants = Tenant::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('web.backend.tenants-info.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("web.backend.tenants-info.create");
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(TenantStoreRequest $request)
    {
        // Validation rules for the form fields, handled by the request class
        $validatedData = $request->validated();

        // Create a new property using the validated data
        Tenant::create($validatedData);

        return redirect()->route('tenant.index')->with('creation-success', 'New tenant record has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tenant = Tenant::findOrFail($id);

        return view('web.backend.tenants-info.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tenant = Tenant::findOrFail($id);

        return view('web.backend.tenants-info.update', compact('tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TenantUpdateRequest $request, string $id)
    {
        // Find the Property model by ID
        $tenant = Tenant::findOrFail($id);

        // Validation rules for the form fields
        $validatedData = $request->validated();

        // Update the Remittance attributes
        $tenant->update($validatedData);

        return redirect()->route('tenant.index')
                        ->with('update-success', 'The tenant data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            $tenant = Tenant::findOrFail($id);

            $tenant->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
