@extends('web.backend.layouts.master')

@section('dashboard')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Tenants</h4>
                        </div>
                        <div class="card-body">
                            {{ $tenants->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Remittance</h4>
                        </div>
                        <div class="card-body">
                            {{ $remittances->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Service Charge</h4>
                        </div>
                        <div class="card-body">
                            {{ $service_charges->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Overdue</h4>
                        </div>
                        <div class="card-body">
                            {{ $overdues->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Duration of Rent Due to all Tenants!</h4>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr style="text-align: center;">
                            <th>Tenant Names</th>
                            <th>Apartment</th>
                            <th>Due Date</th>
                            <th>Countdown</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($countdowns->isEmpty())
                            <p>No tenant's rent is close to being overdue yet.</p>
                        @else
                            @foreach ($countdowns as $countdown)
                            <tr style="text-align: center;">
                                <td><a>{{ $countdown->tenant_name }}</a></td>
                                <td class="font-weight-600">{{ $countdown->apartment }}</td>
                                <td>{{ $countdown->rent_due_date }}</td>
                                <td style="color: red">
                                    @php
                                        $dueDate = Carbon\Carbon::parse($countdown->rent_due_date);
                                        $the_countdown = $now->diffInHours($dueDate);

                                        // If less than a day, display hours
                                        if ($the_countdown < 24) {
                                            echo $the_countdown . ' hours';
                                        } else {
                                            echo $now->diffInDays($dueDate) . ' days';
                                        }
                                    @endphp
                                    {{-- {{ $countdown }} days left --}}
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $countdowns->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>All Overdue Tenant Rents!</h4>
            </div>

            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr style="text-align: center;">
                            <th>Tenant Names</th>
                            <th>Apartment</th>
                            <th>Due Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($overdues->isEmpty())
                            <p>No tenant's rent is overdue yet.</p>
                        @else
                            @foreach ($overdues as $overdue)
                            <tr style="text-align: center;">
                                <td><a>{{ $overdue->tenant_name }}</a></td>
                                <td class="font-weight-600">{{ $overdue->apartment }}</td>
                                <td>{{ $overdue->rent_due_date }}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $overdues->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>
@endsection
