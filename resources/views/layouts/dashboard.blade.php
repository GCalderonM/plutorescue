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
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" integrity="sha512-n+g8P11K/4RFlXnx2/RW1EZK25iYgolW6Qn7I0F96KxJibwATH3OoVCQPh/hzlc4dWAwplglKX8IVNVMWUUdsw==" crossorigin="anonymous" />
    <!-- Vendor styles -->
    @yield('vendor-style')
    <!-- Custom page styles -->
    @yield('page_styles')
    @livewireStyles
    @toastr_css
    <title>@yield('title') - PlutoRescue</title>
</head>
<body class="c-app">
    <!-- Sidebar -->
    @include('partials.sidebar')
    <!-- Header and content -->
    <div class="c-wrapper c-fixed-components">
        @include('partials.header')
        <div class="c-body">
            <main class="c-main">
                @yield('content')
            </main>
        </div>
    </div>
    <!-- Scripts -->
    @include('panels.scripts')
    <!-- Custom page scripts -->
    @yield('page_scripts')
</body>
</html>
