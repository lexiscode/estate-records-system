@extends('web.backend.layouts.master')

@section('search-tenant-history')
    <section class="section">

        <div class="section-header">
            <h1>View Tenants History</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>Investigate All Tenants Activities Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-icon"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-body">

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
                        @if ($tenants_history_search->isEmpty())
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
                                    <a href="{{ route('tenant-history.index') }}" class="btn btn-primary mt-4">Go Back</a>
                                </div>
                            </div>
                        @else
                            @foreach ($tenants_history_search as $tenant)
                                <tr>
                                    <td><a>{{ $tenant->id }}</a></td>
                                    <td><a>{{ $tenant->tenant_name }}</a></td>
                                    <td class="font-weight-600">{{ $tenant->apartment }}</td>
                                    <td>{{ $tenant->type }}</td>

                                    <td>
                                        <div style="text-align: center;">

                                            <a href="{{ route('tenant-history.show', $tenant->id) }}" class="btn btn-primary"
                                                id="exampleModal"><i class="fas fa-eye"></i>
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

