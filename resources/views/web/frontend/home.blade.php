<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Estatelex</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    {{-- <a href="index.html"><img src="{{ asset('partners/adis-hotel/images/logo.png') }}" alt="#" /></a> --}}
                                    <a href="">ESTATELEX</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <section class="banner_main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-bg">
                        <div class="padding_lert">
                            <h1>ESTATELEX MANAGEMENT SYSTEM</h1>
                            <h2 style="color: white">PROPERLY ORGANIZE RECORDS</h2>
                            <p>Our comprehensive web application is meticulously designed to streamline
                                the complexities of managing your real estate portfolio effortlessly.
                                Say goodbye to cumbersome paperwork and hello to a modern, user-friendly
                                solution.
                            </p>

                            <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign In</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">

                                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                                    @csrf
                                    <div class="modal-content" style="background-color: #f89646">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color: white">Go To Admin Panel</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div>
                                                @if (session()->has('error'))
                                                <p class='text-sm text-red-600 space-y-1' style="text-align:center">
                                                    {{ session()->get('error') }}
                                                </p>
                                                @endif
                                            <p class="w-50 m-auto">
                                                <label for="email" style="color: white">Email:</label>
                                                <input class="form-control" type="text" name="email" id="email" placeholder="Enter Your Email" required>
                                                <br>
                                                <label for="password" style="color: white">Password:</label>
                                                <input class="form-control" type="password" name="password" id="password" placeholder="Enter Your Password" required>
                                                <br>

                                                <a style="text-transform: lowercase; color: black;" href="/forgot-password" onmouseover="this.style.color='black'" onmouseout="this.style.color='black'"><i>Forgot password?</i></a>
                                            </p>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-info" name="sign-in">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>

</html>
