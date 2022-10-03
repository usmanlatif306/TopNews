<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ setting('company_name') }}</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- endinject -->

    @stack('styles')
    @livewireStyles
</head>

<body>
    <div id="app" class="container-scroller">
        <!-- navbar start -->
        @include('layouts.admin_header')
        <!-- navbar end -->
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar start -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                @include('layouts.admin_menu')
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <!-- content-wrapper starts -->
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- footer -->
                <footer class="footer">
                    <div class="d-flex justify-content-center">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                            {{ now()->format('Y') }}. <a href="{{ url('/') }}"
                                target="_blank">{{ setting('company_name') }}</a>
                            All rights reserved.</span>

                    </div>
                </footer>
                <!-- footer end-->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    {{-- js files --}}
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
