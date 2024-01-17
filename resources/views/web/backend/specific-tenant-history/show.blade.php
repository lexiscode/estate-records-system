@extends('web.backend.layouts.master')

@section('show-tenant-history')
    <section class="section">

        <div class="section-header">
            <h1>View Tenants History</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Investigate All Tenants Activities Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('tenant-history.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <h2 style="color: black;">{{ $tenant->tenant_name }}</h2>
                <p style="color: black;">Apartment: {{ $tenant->apartment }}</p>
                <p style="color: black;">Payment Type: {{ $tenant->type }}</p>

                <h3>Remittance History:</h3>
                @if ($tenant->remittance && $tenant->remittance->count() > 0)
                    <ul>
                        @foreach ($tenant->remittance as $remittance)
                            <li>
                                <p>Status: {{ $remittance->status }}</p>
                                <p>Rent Fee: {{ $remittance->rent_fee }}</p>
                                <p>Amount Paid: {{ $remittance->amount_paid }}</p>
                                <p>Payment Date: {{ $remittance->payment_date }}</p>
                                <p>Debt Amount: {{ $remittance->debt_amount }}</p>
                                <p>Debt Due-Date: {{ $remittance->debt_due_date }}</p>
                                <p>Rent Due-Date: {{ $remittance->rent_due_date }}</p>
                                <p>Payment Method: {{ $remittance->payment_method }}</p>
                                <p>Notes: {{ $remittance->notes }}</p>
                                <p>Payment Proof: {{ $remittance->payment_proof }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No history for this tenant.</p>
                @endif

                <h3>Service Charge History:</h3>
                @if ($tenant->service_charge && $tenant->service_charge->count() > 0)
                    <ul>
                        @foreach ($tenant->service_charge as $serviceCharge)
                            <li>
                                <p>Status: {{ $serviceCharge->status }}</p>
                                <p>Charge Fee: {{ $serviceCharge->charge_fee }}</p>
                                <p>Amount Paid: {{ $serviceCharge->amount_paid }}</p>
                                <p>Payment Date: {{ $serviceCharge->payment_date }}</p>
                                <p>Debt Amount: {{ $serviceCharge->debt_amount }}</p>
                                <p>Debt Due-Date: {{ $serviceCharge->debt_due_date }}</p>
                                <p>Charge Due-Date: {{ $serviceCharge->charge_due_date }}</p>
                                <p>Payment Method: {{ $serviceCharge->payment_method }}</p>
                                <p>Notes: {{ $serviceCharge->notes }}</p>
                                <p>Payment Proof: {{ $serviceCharge->payment_proof }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No service charge history for this tenant.</p>
                @endif

            </div>
        </div>

    </section>

@endsection


