<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Estatelex Admin</title>
  <link rel="icon" href="" type="image/png"> <!--place site favicon in the href-->

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/weather-icon/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">

        <!-- Includes the sidebar layout here-->
        @include('web.backend.layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">

        <!-- Dashboard section -->
        @yield('dashboard')

        <!-- Admin Profile section -->
        @yield('index-profile')

        <!-- Remittance section -->
        @yield('index-remittances')
        @yield('create-remittances')
        @yield('show-remittances')
        @yield('update-remittances')
        @yield('search-remittances')

        <!-- Tenant section-->
        @yield('index-tenant-records')
        @yield('create-tenant-records')

        <!-- Tenants Information -->
        @yield('index-tenants-info')
        @yield('create-tenants-info')
        @yield('show-tenants-info')
        @yield('update-tenants-info')
        @yield('search-tenants-info')

        <!-- Service Charges Information -->
        @yield('index-service-charge')
        @yield('create-service-charge')
        @yield('show-service-charge')
        @yield('update-service-charge')
        @yield('search-service-charge')

        <!-- Specific Tenant History -->
        @yield('index-tenant-history')
        @yield('show-tenant-history')
        @yield('search-tenant-history')

        <!-- Specific Tenant History -->
        @yield('index-role-users')
        @yield('create-role-users')
        @yield('edit-role-users')

        </div>

        <footer class="main-footer">
            <div class="footer-left">
            Copyright &copy; 2023 <div class="bullet"></div> Designed By <a href="#">Alexander V.</a>
            </div>
            <div class="footer-right">

            </div>
        </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/assets/js/page/index-0.js') }}"></script>
    <script src="{{ asset('admin/assets/js/page/features-post-create.js') }}"></script>
    <script src="{{ asset('admin/assets/js/page/forms-advanced-forms.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

    <!-- Filter search JS File -->
    <script src="{{ asset("admin/assets/js/filter-status.js") }}"></script>
    <script src="{{ asset("admin/assets/js/filter-type.js") }}"></script>
    <script src="{{ asset("admin/assets/js/filter-apartment.js") }}"></script>

    @stack('scripts')

    <!-- SweetAlert by realrashid-->
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    @include('sweetalert::alert')

    <!-- SweetAlert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        /* Handles Image Preview*/
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });


        /*This below handles the deleting functionality, alongside a <meta> in html header above*/
        // Add csrf token in ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Handle Dynamic delete
        $(document).ready(function() {
            $('.delete-item').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = $(this).attr('href');
                        console.log(url);
                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            success: function(data) {
                                if (data.status === 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status === 'error') {
                                    Swal.fire(
                                        'Error!',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });

                    }
                })
            })
        })
    </script>

</body>
</html>
