<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ URL::asset('favicon/site.webmanifest') }}">
    @yield('meta')
    <!-- Plugins Styles -->
    <link href="{{ URL::asset('plugins/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/flag-icons/css/flag-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/jquery-tags-input/dist/jquery.tagsinput.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/summernote/dist/summernote-bs4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('plugins/@ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css') }}" rel="stylesheet" />

    <!-- Plugins Scripts -->
    <script src="{{ URL::asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/bootstrap-maxlength/dist/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-slugify/dist/slugify.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-sortable-lists/jquery-sortable-lists.js') }}"></script>
    <script src="{{ URL::asset('plugins/jquery-tags-input/dist/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/summernote/dist/summernote-bs4.min.js') }}" defer></script>
    <script src="{{ URL::asset('plugins/speakingurl/lib/speakingurl.js') }}"></script>
    <script src="{{ URL::asset('plugins/@fortawesome/fontawesome-pro/js/all.min.js') }}"></script>

    <!-- Page styles -->
    @stack('styles')

    <!-- Page Scripts -->
    @stack('js')

    <!-- Admin styles -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/admin/nobileUi.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset(mix('css/admin/admin.css')) }}" rel="stylesheet" />

    <!-- Admin scripts -->
    <script src="{{ URL::asset(mix('js/admin/admin.js')) }}"></script>
    <script src="{{ URL::asset(URL::asset('js/admin/nobileUi.js')) }}"></script>
    <script src="{{ URL::asset(URL::asset('js/admin/dropify.js')) }}"></script>
    <script src="{{ URL::asset('plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
</head>

<body class="{{ $cssNs }}" data-base-url="{{ url('/') }}">

    <script src="{{ URL::asset('js/admin/spinner.js') }}"></script>

    <div class="{{ $cssNs }} main-wrapper" id="app">

        @include('admin.layouts.sidebar')

        <div class="page-wrapper">

            @include('admin.layouts.topbar')

            <div class="page-content">

                {{ $slot }}

            </div>

            @include('admin.layouts.footer')

        </div>

    </div>

</body>
</html>
