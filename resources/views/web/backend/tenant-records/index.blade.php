@extends('web.backend.layouts.master')

@section('index-tenant-records')
    <section class="section">

        <div class="section-header">
            <h1>Manage A Tenant Records</h1>
        </div>

        <div class="card card-warning">
            <div class="card-header">
                <h4>View or Download Your Tenants Account Statements!</h4>

                <form class="card-header-form" action="" method="GET">
                    <div class="input-group">

                        <!-- This is the create new blog button -->
                        <div class="card-header-action">
                            <a href="{{ route('remit.create') }}" class="btn btn-primary">Add New Record</a>
                        </div>

                    </div>
                </form>

            </div>
            <div class="card-body">
                <h2 style="text-align: center;">View Statement in Here</h2>
                <!-- This is a form to view a specifc tenant account history directly from the webpage-->
                <form method="GET" action="{{ route('statement.create') }}">

                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Find A Tenant:</label>
                                <select class="form-control select2" name="name_of_tenant" required>
                                    @foreach ($all_tenant as $tenant)
                                        <option>{{ $tenant }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Find The Tenant Apartment:</label>
                                <select class="form-control select2" name="name_of_apartment" required>
                                    @foreach ($all_apartment as $apartment)
                                        <option>{{ $apartment }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputStartDate">Start Date:</label>
                                <input type="date" name="start_date" class="form-control" id="inputStartDate" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEndDate">End Date:</label>
                                <input type="date" name="end_date" class="form-control" id="inputEndDate" required>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-eye"></i> View Statement</button>
                        </div>

                        <p><i>NB: Make use of the "rent due-dates" to evaluate the date ranges for the receipt generation</i></p>

                    </div>
                </form>

                <hr>
                <h2 style="text-align: center;">Generate Statement in PDF</h2>
                <!-- This is a form to download PDF format of a specifc tenant account history -->
                <form method="GET" action="{{ route('statement.generate-pdf') }}">

                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Find A Tenant:</label>
                                <select class="form-control select2" name="name_of_tenant" required>
                                    @foreach ($all_tenant as $tenant)
                                        <option>{{ $tenant }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label>Find The Tenant Apartment:</label>
                                <select class="form-control select2" name="name_of_apartment" required>
                                    @foreach ($all_apartment as $apartment)
                                        <option>{{ $apartment }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputStartDate">Start Date:</label>
                                <input type="date" name="start_date" class="form-control" id="inputStartDate" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEndDate">End Date:</label>
                                <input type="date" name="end_date" class="form-control" id="inputEndDate" required>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Generate PDF</button>
                        </div>

                    </div>
                </form>

                <hr>


            </div>
        </div>

    </section>

@endsection



