@extends('web.backend.layouts.master')

@section('create-tenants-info')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Service Charge</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage All Service Charge Data!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <div class="card-header-action">
                            <a href="{{ route('service-charge.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('service-charge.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputTenant">Name Of Tenant:</label>
                            <select class="form-control select2" name="tenant_name" id="inputTenant" required>
                                @foreach ($all_tenant as $tenant)
                                    <option>{{ $tenant }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please fill the name of tenant
                            </div>
                            @error('tenant_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputTenantId">Tenant #ID Number:</label>
                            <input type="number" class="form-control" name="tenant_id" id="inputTenantId">
                            <div class="invalid-feedback">
                                Please fill in the #id of tenant
                            </div>
                            @error('tenant_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apartment">Apartment:</label>
                            <select class="form-control select2" name="apartment" id="apartment" required>
                                @foreach ($all_tenants_apartment as $apartment)
                                    <option>{{ $apartment }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                Please fill in the name/location of apartment
                            </div>
                            @error('apartment')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="selectStatus">Payment Status:</label>
                            <select class="form-control form-control-sm" name="status" id='selectStatus' required>
                                <option>Paid</option>
                                <option>Partially Paid</option>
                                <option>Overdue</option>
                                <option>Cancelled</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="payment_date">Date Of Payment:</label>
                            <input type="date" class="form-control" name="payment_date" id="payment_date" required>
                            <div class="invalid-feedback">
                                Please fill in the payment date
                            </div>
                            @error('payment_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDebtAmount">Debt Amount (Optional):</label>
                            <input type="number" class="form-control" name="debt_amount" id="inputDebtAmount">
                            <div class="invalid-feedback">
                                Please fill in the debt amount
                            </div>
                            @error('debt_amount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="debt_due_date">Debt Due-Date (Optional):</label>
                            <input type="date" name="debt_due_date" class="form-control" id="debt_due_date" required>
                            <div class="invalid-feedback">
                                Please fill in the debt due-date
                            </div>
                            @error('debt_due_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="charge_due_date">Charge Due-Date:</label>
                            <input type="date" name="charge_due_date" class="form-control" id="charge_due_date" required>
                            <div class="invalid-feedback">
                                Please fill in the charge due-date
                            </div>
                            @error('charge_due_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="payment_method">Payment Method:</label>
                            <select class="form-control form-control-sm" name="payment_method" id='payment_method' required>
                                <option>Cash</option>
                                <option>Bank Transfer</option>
                                <option>Check</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="payment_proof">Payment Proof (Optional):</label>
                            <input type="file" class="form-control" name="payment_proof" id="payment_proof">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="notes">List the Services:</label>
                            <textarea class="form-control" name="notes" id="notes" spellcheck="false" data-ms-editor="true"></textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit Record</button>
                    </div>

                </form>

            </div>

        </div>

    </section>
@endsection

