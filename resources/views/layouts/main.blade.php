<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title', 'SRMS')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/Roboto%20Condensed.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/Features-Image-images.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Hero-Clean-images.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/Navbar-With-Button-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Pricing-Duo-badges.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Ultimate-Testimonial-Slider-BS5.css') }}">
</head>

<body>
    @if (Route::currentRouteName() == 'home')
        @include('layouts.index_header')
    @else
        @include('layouts.default-header')
    @endif

    @yield('content')

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/bs-init.js') }}"></script>
    <script src="{{ asset('js/DateTimeFieldLimit.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>
