<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sidebar.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('assets-bs4/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets-bs4/css/font-awesome.css') }}">
</head>
<body>
    <div id="app">
        @include('super-admin.layouts.navbar')

        <div id="wrapper">
            @include('super-admin.layouts.sidebar')
    
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    @yield('page-content')
                </div>
            </div>
        </div>


    <script src="{{ asset('assets-bs4/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets-bs4/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-bs4/js/popper.min.js') }}"></script>

    <script src="{{ asset('assets/js/sidebar.js') }}"></script>
</body>
</html>
