<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Poppins font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/brand_logo.svg')}}" type="image/x-icon">
    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('page_styles')
    <!-- Custom page styles -->
    <title>@yield('title') - PlutoRescue</title>
</head>
<body class="h-full">
    <!-- Header -->
    @include('panels.navbar')
    <!-- Content -->
    @yield('content')
    <!-- Footer -->
    @include('panels.footer')
    <!-- Scripts -->
    <script src="{{asset('js/menu.js')}}"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Feather icons -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 30, height: 30
                });
            }
        });
    </script>
    @yield('page_scripts')
</body>
</html>
