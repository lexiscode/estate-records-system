@extends('web.backend.layouts.master')

@section('search-tenants-info')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Service Charges</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage All Service Charge Records Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>

                        <!-- This is the create new blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('service-charge.create') }}" class="btn btn-primary">Add New Record</a>
                        </div>

                    </div>

                </form>
            </div>
            <div class="card-body">

                <table class="table">
                    <thead>
                        <tr>
                            <th>Tenant Names</th>
                            <th>Apartment</th>
                            <th>
                                <div style="text-align: center;">Status</div>
                            </th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($service_charge_search->isEmpty())
                            <div class="card-body">
                                <div class="empty-state" data-height="400" style="height: 400px;">
                                    <div class="empty-state-icon">
                                        <i class="fas fa-question"></i>
                                    </div>
                                    <h2>Oops! We couldn't find any data</h2>
                                    <p class="lead">
                                        Note: Ensure that there are no unnecessary space in-between the data name you are searching
                                        for, if still yes, then sorry your search request isn't in available in your database.
                                    </p>
                                    <a href="{{ route('service-charge.index') }}" class="btn btn-primary mt-4">Go Back</a>
                                </div>
                            </div>
                        @else
                            @foreach ($service_charge_search as $service)
                                <tr>

                                    <td><a>{{ $service->tenant_name }}</a></td>
                                    <td class="font-weight-600">{{ $service->apartment }}</td>
                                    <td>
                                        @if ($service->status === 'Paid')
                                        <div class="badge badge-success">{{ $service->status }}</div>
                                        @elseif ($service->status === 'Partially Paid')
                                            <div class="badge badge-info">{{ $service->status }}</div>
                                        @elseif ($service->status === 'Overdue')
                                            <div class="badge badge-warning">{{ $service->status }}</div>
                                        @endif
                                    </td>

                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('service-charge.show', $service->id) }}" class="btn btn-primary"
                                                id="exampleModal"><i class="fas fa-eye"></i></a>

                                            <a href="{{ route('service-charge.edit', $service->id) }}"
                                                class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <a href="{{ route('search-charge.destroy', $service->id) }}" class="btn btn-danger delete-item">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>

    </section>

@endsection




