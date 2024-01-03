@extends('web.backend.layouts.master')

@section('index-tenant-history')
    <section class="section">

        <div class="section-header">
            <h1>View Tenants History</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Investigate All Tenants Activities Here!</h4>

                <form class="card-header-form" action="{{ route('tenant-history.search') }}" method="GET">
                    <div class="input-group">

                        <input type="text" name="query" class="form-control" placeholder="Search ">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
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

                <table class="table">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Tenant Names</th>
                            <th>Apartment</th>
                            <th>
                                <div style="text-align: center;">Type</div>
                            </th>
                            <th scope="col">
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($tenants->isEmpty())
                            <p>No tenant data found.</p>
                        @else
                            @foreach ($tenants as $tenant)
                            <tr>
                                <td><a>{{ $tenant->id }}</a></td>
                                <td><a>{{ $tenant->tenant_name }}</a></td>
                                <td class="font-weight-600">{{ $tenant->apartment }}</td>
                                <td class="tenant-type">{{ $tenant->type }}</td>
                                <td>
                                    <div style="text-align: center;">

                                        <a href="{{ route('tenant-history.show', $tenant->id) }}"
                                            class="btn btn-primary" id="exampleModal"><i class="fas fa-eye"></i>
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
                    {{ $tenants->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>

@endsection
