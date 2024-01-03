<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\ServiceCharge;
use App\Http\Requests\ServiceChargeStoreRequest;
use App\Http\Requests\ServiceChargeUpdateRequest;

class ServiceChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service_charges = ServiceCharge::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('web.backend.service-charge.index', compact('service_charges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_tenant = Tenant::distinct('tenant_name')->pluck('tenant_name');
        $all_tenants_apartment = Tenant::distinct('apartment')->pluck('apartment');

        return view("web.backend.service-charge.create", compact('all_tenant', 'all_tenants_apartment'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceChargeStoreRequest $request)
    {
        // Validation rules for the form fields, handled by the request class
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('payment_proof')) {
            $image = $request->file('payment_proof');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/service-charge'), $imageName);

            // Generate the URL for the image
            $imageUrl = url('uploads/service-charge/' . $imageName);

            // Save the image name to the database
            $validatedData['payment_proof'] = $imageUrl;
        }

        // Create a new property using the validated data
        ServiceCharge::create($validatedData);

        return redirect()->route('service-charge.index')->with('creation-success', 'New service charge record has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service_charge = ServiceCharge::findOrFail($id);

        return view('web.backend.service-charge.show', compact('service_charge'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service_charge = ServiceCharge::findOrFail($id);

        $all_tenant = Tenant::distinct('tenant_name')->get();
        $all_tenants_apartment = Tenant::distinct('apartment')->get();

        return view('web.backend.service-charge.update', compact('service_charge', 'all_tenants_apartment', 'all_tenant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceChargeUpdateRequest $request, string $id)
    {
        // Find the Property model by ID
        $service_charge = ServiceCharge::findOrFail($id);

        // Validation rules for the form fields
        $validatedData = $request->validated();

        // Handle image upload if a new image is provided
        if ($request->hasFile('payment_proof')) {

            $image = $request->file('payment_proof');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/service-charge'), $imageName);

            // Generate the URL for the image
            $imageUrl = url('uploads/service-charge/' . $imageName);

            // Save the new image name to the database
            $validatedData['payment_proof'] = $imageUrl;
        }

        // Update the Remittance attributes
        $service_charge->update($validatedData);

        return redirect()->route('service-charge.index')
                        ->with('update-success', 'The service charge data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            $service_charge = ServiceCharge::findOrFail($id);

            $service_charge->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}

