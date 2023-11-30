@extends('web.backend.layouts.master')

@section('show-service-charge')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Service Charge</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Service Charge Details Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('service-charge.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <h2 style="color: black;">{{ $service_charge->tenant_name }}</h2>
                <p style="color: black;">Apartment: {{ $service_charge->apartment }}</p>
                <p style="color: black;">Payment Status: {{ $service_charge->status }}</p>
                <p style="color: black;">Generator Fee: {{ $service_charge->generator_fee }}</p>
                <p style="color: black;">NEPA Light Fee: {{ $service_charge->nepa_light_fee }}</p>
                <p style="color: black;">Sockaway Fee: {{ $service_charge->sockaway_fee }}</p>
                <p style="color: black;">Borehole Fee: {{ $service_charge->borehole_fee }}</p>
                <p style="color: black;">Payment Date: {{ $service_charge->payment_date }}</p>
                <p style="color: black;">Debt Amount: {{ $service_charge->debt_amount }}</p>
                <p style="color: black;">Debt Due-Date: {{ $service_charge->debt_due_date }}</p>
                <p style="color: black;">Charge Due-Date: {{ $service_charge->charge_due_date }}</p>
                <p style="color: black;">Payment Method: {{ $service_charge->payment_method }}</p>
                <p style="color: black;">Payment Proof: {{ $service_charge->payment_proof }}</p>
                <p style="color: black;">Notes: {{ $service_charge->notes }}</p>

            </div>
        </div>

    </section>

@endsection

