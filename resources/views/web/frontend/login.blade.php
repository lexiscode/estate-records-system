@extends('web.frontend.layout.master')

@section('login')

<div class="container">
    <div class="row my-4 my-lg-5">
        <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 text-center">
            <div style="border: 2px solid black; padding: 20px; border-radius: 20px;">
                <a href="{{ url('/') }}">
                <h1 class="m-0 text-primary text-uppercase">Estatelex</h1>
                </a>
                <p class="font-20 semi-font fables-main-text-color mt-4 mb-4 mb-lg-5">Administrator Login</p>

                <!--Displays "please login first" error on unauthorize admin user-->
                @if (session()->has('error'))
                <p class='text-sm text-red-600 space-y-1' style="text-align:center">
                    {{ session()->get('error') }}
                </p>
                @endif

                @if (session()->has('success'))
                    <p class='text-sm text-green-600 space-y-1' style="text-align:center">
                        {{ session()->get('success') }}
                    </p>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-icon">
                            <span class="fables-iconemail fables-input-icon mt-2 font-13"></span>
                            <input type="email" name="email" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"  placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-icon">
                        <span class="fables-iconpassword fables-input-icon font-19 mt-1"></span>
                        <input type="password" name="password" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input" placeholder="Password">
                        </div>

                    </div>
                    <button type="submit" class="btn btn-block rounded-0 white-color fables-main-hover-background-color fables-second-background-color font-16 semi-font py-3">Sign in</button>
                    <a href="{{ route('forgot-password') }}" class="fables-forth-text-color font-16 fables-second-hover-color underline mt-3 mb-4 m-lg-5 d-block">Forgot Password ?</a>
                </form>
            </div>
        </div>
    </div>

</div>

@endsection
