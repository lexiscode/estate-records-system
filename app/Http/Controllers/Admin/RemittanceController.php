<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tenant;
use App\Models\Remittance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RemittanceStoreRequest;
use App\Http\Requests\RemittanceUpdateRequest;

class RemittanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $remittances = Remittance::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('web.backend.remittance.index', compact('remittances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_tenant = Tenant::distinct('tenant_name')->pluck('tenant_name');
        $all_tenants_apartment = Tenant::distinct('apartment')->pluck('apartment');

        return view("web.backend.remittance.create", compact('all_tenant', 'all_tenants_apartment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RemittanceStoreRequest $request)
    {
        // Validation rules for the form fields, handled by the request class
        $validatedData = $request->validated();

        // Handle image upload
        if ($request->hasFile('payment_proof')) {
            $image = $request->file('payment_proof');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Move the uploaded image to the public directory
            $image->move(public_path('uploads/remits'), $imageName);

            // Generate the URL for the image
            $imageUrl = url('uploads/remits/' . $imageName);

            // Save the image name to the database
            $validatedData['payment_proof'] = $imageUrl;
        }

        // Create a new property using the validated data
        Remittance::create($validatedData);

        return redirect()->route('remit.index')->with('creation-success', 'New record has been added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $remittance = Remittance::findOrFail($id);

        return view('web.backend.remittance.show', compact('remittance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $remittance = Remittance::findOrFail($id);

        return view('web.backend.remittance.update', compact('remittance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RemittanceUpdateRequest $request, string $id)
    {
        // Find the Property model by ID
        $remittance = Remittance::findOrFail($id);

        // Validation rules for the form fields
        $validatedData = $request->validated();

        // Handle image upload if a new image is provided
        if ($request->hasFile('payment_proof')) {

            $image = $request->file('payment_proof');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/remits/' . $imageName;
            $image->move(public_path('uploads/remits'), $imageName);

            // Generate the URL for the image
            $imageUrl = url('uploads/remits/' . $imageName);

            // Save the new image name to the database
            $validatedData['payment_proof'] = $imageUrl;
        }

        // Update the Remittance attributes
        $remittance->update($validatedData);

        return redirect()->route('remit.index')
                        ->with('update-success', 'The tenant data has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{

            $remittance = Remittance::findOrFail($id);

            $remittance->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);

        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('Something went wrong!')]);
        }
    }
}
