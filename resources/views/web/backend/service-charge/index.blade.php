@extends('web.backend.layouts.master')

@section('index-service-charge')
    <section class="section">

        <div class="section-header">
            <h1>Manage All Service Charge</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Manage All Service Charge Records Here!</h4>

                <form class="card-header-form" action="{{ route('service-charge.search') }}" method="GET">
                    <div class="input-group">

                        <input type="text" name="query" class="form-control" placeholder="Search ">
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

                <!-- Display new tenant data row success message if it exists -->
                @if (session('creation-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('creation-success') }}
                        </div>
                    </div>
                @endif

                <!-- Display updated tenant data row success message if it exists -->
                @if (session('update-success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('update-success') }}
                        </div>
                    </div>
                @endif

                <!-- The filter field -->
                <div class="mb-3">
                    <label for="statusFilter" class="form-label">Filter by Status:</label>
                    <select class="form-control" id="statusFilter">
                        <option value="All">All</option>
                        <option value="Monthly">Paid</option>
                        <option value="Quarterly">Partially Paid</option>
                        <option value="Semi-Annually">Overdue</option>
                    </select>
                </div>

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
                        @if ($service_charges->isEmpty())
                            <p>No service charge data found.</p>
                        @else
                            @foreach ($service_charges as $service)
                            <tr>

                                <td><a>{{ $service->tenant_name }}</a></td>
                                <td class="font-weight-600">{{ $service->apartment }}</td>
                                <td class="payment-status">
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

                                        <a href="{{ route('service-charge.show', $service->id) }}"
                                            class="btn btn-primary" id="exampleModal"><i class="fas fa-eye"></i></a>

                                        <a href="{{ route('service-charge.edit', $service->id) }}"
                                            class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <a href="{{ route('service-charge.destroy', $service->id) }}" class="btn btn-danger delete-item">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $service_charges->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>

@endsection
