<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title inertia></title>
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body>
    @inertia
</body>

@admin

@endadmin

@normal

    <script src="{{ asset('assets/landing/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/landing/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/landing/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/landing/plugins/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/landing/plugins/slick-carousel/slick.min.js') }}"></script>
    <script src="{{ asset('assets/landing/plugins/magnific-popup/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/landing/plugins/instafeed-js/instafeed.min.js') }}"></script>
    <script src="{{ asset('assets/landing/plugins/google-map/gmap.js') }}"></script>
    <script src="{{ asset('assets/landing/js/custom.js') }}"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/landing/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/plugins/slick-carousel/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/plugins/slick-carousel/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/plugins/owl-carousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/plugins/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/style.css') }}">
@endnormal

</html>
