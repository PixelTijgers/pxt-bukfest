<!doctype html>
<!--

$$$$$$$\  $$\                     $$\   $$\     $$\
$$  __$$\ \__|                    $$ |  $$ |    \__|
$$ |  $$ |$$\ $$\   $$\  $$$$$$\  $$ |$$$$$$\   $$\ $$\  $$$$$$\   $$$$$$\   $$$$$$\   $$$$$$$\
$$$$$$$  |$$ |\$$\ $$  |$$  __$$\ $$ |\_$$  _|  $$ |\__|$$  __$$\ $$  __$$\ $$  __$$\ $$  _____|
$$  ____/ $$ | \$$$$  / $$$$$$$$ |$$ |  $$ |    $$ |$$\ $$ /  $$ |$$$$$$$$ |$$ |  \__|\$$$$$$\
$$ |      $$ | $$  $$<  $$   ____|$$ |  $$ |$$\ $$ |$$ |$$ |  $$ |$$   ____|$$ |       \____$$\
$$ |      $$ |$$  /\$$\ \$$$$$$$\ $$ |  \$$$$  |$$ |$$ |\$$$$$$$ |\$$$$$$$\ $$ |      $$$$$$$  |
\__|      \__|\__/  \__| \_______|\__|   \____/ \__|$$ | \____$$ | \_______|\__|      \_______/
                                              $$\   $$ |$$\   $$ |
                                              \$$$$$$  |\$$$$$$  |
                                               \______/  \______/
-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ URL::asset('favicon/site.webmanifest') }}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    @yield('meta')

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('plugins/flag-icons/css/flag-icons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/mmenu-js/dist/mmenu.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/mburger-css/dist/mburger.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/slick-slider/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/slick-slider/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ URL::asset(mix('css/front/front.css')) }}">

    <!-- Scripts -->
    <script src="{{ URL::asset(mix('js/front/front.js')) }}"></script>
    <script src="{{ URL::asset('plugins/@fortawesome/fontawesome-pro/js/all.min.js') }}" data-search-pseudo-elements defer></script>
    <script src="{{ URL::asset('plugins/mmenu-js/dist/mmenu.js') }}"></script>
    <script src="{{ URL::asset('plugins/mburger-css/dist/mburger.js') }}" type="module"></script>
    <script src="{{ URL::asset('plugins/slick-slider/slick/slick.min.js') }}" defer></script>
    <script src="https://polyfill.io/v3/polyfill.js?features=default"></script>

    <!-- Page styles -->
    @stack('styles')

    <!-- Page scripts -->
    @stack('scripts')

</head>

<body>

    @include('front.google-analytics')

    <div id="page-container">

        {{ $slot }}

    </div>

</body>
</html>
