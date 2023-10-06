@extends('web.frontend.layout.master')

@section('forgot-password')

<!-- Start page content -->
<div class="container">
    <div class="row my-4 my-lg-5">
         <div class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3 text-center">
            <h1 class="m-0 text-primary text-uppercase">Estatelex</h1>
            <p class="font-20 semi-font fables-main-text-color mt-4 mb-5">Forgot Password</p>

            <div class="mb-4 text-sm text-gray-600">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </div>

            @if (session()->has('success'))
                <i style="margin: 0 auto; text-align: center; color: green"><b>{{ session()->get('success') }}</b></i>
                <br>
            @endif

            <form method="POST" action="{{ route('forgot-password.send') }}">
            @csrf
                <div class="form-group">
                    <div class="input-icon">
                        <span class="fables-iconemail fables-input-icon mt-2 font-13"></span>
                        <input type="email" name="email" class="form-control rounded-0 py-3 pl-5 font-13 sign-register-input"  placeholder="Email">
                    </div>

                </div>

                <button type="submit" class="btn btn-block rounded-0 white-color fables-main-hover-background-color fables-second-background-color font-16 semi-font py-3">Send Reset Link</button>

            </form>
         </div>
    </div>

</div>

<!-- /End page content -->

@endsection
