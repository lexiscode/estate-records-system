@extends('web.backend.layouts.master')

@section('show-tenants-info')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Remits</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Tenants Detail Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">

                        <!-- This is the save blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('tenant.index') }}" class="btn btn-primary">Back</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <h2 style="color: black;">{{ $tenant->tenant_name }}</h2>
                <p style="color: black;">Apartment: {{ $tenant->apartment }}</p>
                <p style="color: black;">Payment Type: {{ $tenant->type }}</p>

            </div>
        </div>

    </section>

@endsection
