@extends('web.backend.layouts.master')

@section('update-remittances')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Remits</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage All Tenants Dealings With You!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <div class="card-header-action">
                            <a href="{{ route('remit.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('remit.update', $remittance->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputTenant">Name Of Tenant:</label>
                            <input type="text" name="tenant_name" class="form-control" id="inputTenant" value="{{ $remittance->tenant_name }}" required>
                            <div class="invalid-feedback">
                                Please fill in the tenant name
                            </div>
                            @error('tenant_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputTenantId">Tenant #ID Number:</label>
                            <input type="number" class="form-control" name="tenant_id" id="inputTenantId" value="{{ $remittance->tenant_id }}">
                            <div class="invalid-feedback">
                                Please fill in the #id of tenant
                            </div>
                            @error('tenant_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label for="apartment">Apartment:</label>
                            <input type="text" class="form-control" name="apartment" id="apartment" value="{{ $remittance->apartment }}" placeholder="Enter name or location of the apartment" required>
                            <div class="invalid-feedback">
                                Please fill in apartment name
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
                                @foreach ([
                                    'Paid' => 'Paid',
                                    'Partially Paid' => 'Partially Paid',
                                    'Overdue' => 'Overdue',
                                    'Cancelled' => 'Cancelled',
                                ] as $optionValue => $optionLabel)
                                    <option value="{{ $optionValue }}" {{ $remittance->status === $optionValue ? 'selected' : '' }}>
                                        {{ $optionLabel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputRentAmount">Actual Rent Fee:</label>
                            <input type="number" name="rent_fee" class="form-control" id="inputRentAmount" value="{{ $remittance->rent_fee }}" required>
                            <div class="invalid-feedback">
                                Please fill in the actual rent fee
                            </div>
                            @error('rent_fee')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputPaidAmount">Amount Paid:</label>
                            <input type="number" name="amount_paid" class="form-control" id="inputPaidAmount" value="{{ $remittance->amount_paid }}" required>
                            <div class="invalid-feedback">
                                Please fill in the amount paid
                            </div>
                            @error('amount_paid')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="payment_date">Date Of Payment:</label>
                            <input type="date" class="form-control" name="payment_date" id="payment_date" value="{{ $remittance->payment_date }}" required>
                            <div class="invalid-feedback">
                                Please fill in the payment date
                            </div>
                            @error('payment_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputDebtAmount">Debt Amount (Optional):</label>
                            <input type="number" class="form-control" name="debt_amount" id="inputDebtAmount" value="{{ $remittance->debt_amount }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="debt_due_date">Debt Due-Date (Optional):</label>
                            <input type="date" name="debt_due_date" class="form-control" id="debt_due_date" value="{{ $remittance->rent_due_date }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="rent_due_date">Rent Due-Date:</label>
                            <input type="date" name="rent_due_date" class="form-control" id="rent_due_date" value="{{ $remittance->rent_due_date }}" required>
                            <div class="invalid-feedback">
                                Please fill in the rent due-date
                            </div>
                            @error('rent_due_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="payment_method">Payment Method: </label>
                            <select class="form-control form-control-sm" name="payment_method" id='payment_method' value="{{ $remittance->payment_method }}" required>
                                @foreach ([
                                    'Cash' => 'Cash',
                                    'Bank Transfer' => 'Bank Transfer',
                                    'Check' => 'Check',
                                ] as $optionValue => $optionLabel)
                                    <option value="{{ $optionValue }}" {{ $remittance->payment_method === $optionValue ? 'selected' : '' }}>
                                        {{ $optionLabel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="payment_proof">Payment Proof (Optional):</label>
                            <input type="file" class="form-control" name="payment_proof" id="payment_proof" value="{{ $remittance->payment_proof }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="notes">Extra Notes (Optional):</label>
                            <textarea class="form-control" name="notes" id="notes" spellcheck="false" data-ms-editor="true">{{ $remittance->notes }}</textarea>
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
