@extends('web.backend.layouts.master')

@section('index-role-users')
    <section class="section">

        <div class="section-header">
            <h1>{{ __('Manage Role Users') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Manage Your Roles Here!</h4>
                <form class="card-header-form">
                    <div class="input-group">
                        <!-- This is the create new property button -->
                        <div class="card-header-action">
                            <a href="{{ route('role-user.create') }}" class="btn btn-primary">Create New User</a>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-body">

                <!-- Display new role user creation success message if it exists -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <!-- Display deleted role user success message if it exists -->
                @if (session('delete-success'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('delete-success') }}
                        </div>
                    </div>
                @endif
                <!-- Display deleted role user success message if it exists -->
                @if (session('delete-error'))
                    <div class="alert alert-warning alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('delete-error') }}
                        </div>
                    </div>
                @endif
                <!-- Display updated admin role warning message if it exists -->
                @if (session('update-error'))
                    <div class="alert alert-warning alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>×</span>
                            </button>
                            {{ session('update-error') }}
                        </div>
                    </div>
                @endif


                <!-- This is a simple table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th>
                                <div style="text-align: center;">Actions</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                            <p>No users found.</p>
                        @else
                            @foreach ($users as $user)
                                <tr class="text-center">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><span class="badge bg-primary text-light">
                                        {{ $user->getRoleNames()->first() }}
                                    </span></td>
                                    <td>
                                        <!-- This if condition below, hides the edit and delete button for Super Admin
                                        don't forget that we also have to block the url routes via controller methods of these
                                        two functionalities, in case a user tries to access them via url-->
                                        @if ($user->getRoleNames()->first() != 'Super Admin')
                                            <div style="text-align: center;">

                                                <a href="{{ route('role-user.edit', $user->id) }}"
                                                    class="btn btn-primary btn-action mr-1" data-original-title="Edit">
                                                    <i class="far fa-edit"></i></i>
                                                </a>

                                                <a href="{{ route('role-user.destroy', $user->id) }}" class="btn btn-danger delete-item">
                                                    <i class="fas fa-trash"></i>
                                                </a>

                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <!-- Simple pagination links -->
                <div class="pagination" style="margin: 0 auto; justify-content: center; margin-top: 10px;">
                    {{ $users->links('pagination::simple-bootstrap-4') }}
                </div>

            </div>
        </div>

    </section>

@endsection

