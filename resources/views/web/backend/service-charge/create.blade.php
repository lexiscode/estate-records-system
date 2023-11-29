@extends('web.backend.layouts.master')

@section('create-tenants-info')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Remits</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage All Tenants Data!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <div class="card-header-action">
                            <a href="{{ route('tenant.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('tenant.store') }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputTenant">Name Of Tenant:</label>
                            <input type="text" name="tenant_name" class="form-control" id="inputTenant" required>
                            <div class="invalid-feedback">
                                Please fill the name of tenant
                            </div>
                            @error('tenant_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="apartment">Apartment:</label>
                            <input type="text" class="form-control" name="apartment" id="apartment" placeholder="Enter name or location of the apartment" required>
                            <div class="invalid-feedback">
                                Please fill in the name/location of apartment
                            </div>
                            @error('apartment')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="selectStatus">Type</label>
                            <select class="form-control form-control-sm" name="type" id='selectStatus' required>
                                <option>Monthly</option>
                                <option>Quarterly</option>
                                <option>Semi-Annually</option>
                                <option>Annually</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Record</button>
                    </div>

                </form>
            </div>

        </div>

    </section>
@endsection
