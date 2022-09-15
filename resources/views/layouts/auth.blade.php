<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('company_name') ?? 'Laravel' }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

</head>

<body>
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand d-flex justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2 text-decoration-none">
                                {{-- <span class="app-brand-logo demo">@include('partials.macros', ['width' => 25, 'withbg' => '#696cff'])</span> --}}
                                <span
                                    class="app-brand-text demo text-body fs-18 fw-bolder">{{ setting('company_name') }}</span>
                            </a>
                        </div>
                        <!-- /Logo -->

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
