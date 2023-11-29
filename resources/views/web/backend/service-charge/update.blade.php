@extends('web.backend.layouts.master')

@section('update-tenants-info')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Tenants</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage All Tenants Information Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <div class="card-header-action">
                            <a href="{{ route('tenant.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('tenant.update', $tenant->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputTenant">Name Of Tenant:</label>
                            <input type="text" name="tenant_name" class="form-control" id="inputTenant" value="{{ $tenant->tenant_name }}" required>
                            <div class="invalid-feedback">
                                Please fill in the tenant name
                            </div>
                            @error('tenant_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="apartment">Apartment:</label>
                            <input type="text" class="form-control" name="apartment" id="apartment" value="{{ $tenant->apartment }}" placeholder="Enter name or location of the apartment" required>
                            <div class="invalid-feedback">
                                Please fill in apartment name
                            </div>
                            @error('apartment')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="selectStatus">Type:</label>
                            <select class="form-control form-control-sm" name="type" id='selectStatus' required>
                                @foreach ([
                                    'Monthly' => 'Monthly',
                                    'Quarterly' => 'Quarterly',
                                    'Semi-Annually' => 'Semi-Annually',
                                    'Annually' => 'Annually',
                                ] as $optionValue => $optionLabel)
                                    <option value="{{ $optionValue }}" {{ $tenant->type === $optionValue ? 'selected' : '' }}>
                                        {{ $optionLabel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update Record</button>
                    </div>

                </form>
            </div>

        </div>

    </section>

@endsection

{{--
@push('scripts')

    <script>
        $(document).ready(function(){
            var imageUrl = "{{ $remittance->payment_proof }}";
            $('.image-preview').css({
                "background-image": "url(" + imageUrl + ")",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>

@endpush

--}}
