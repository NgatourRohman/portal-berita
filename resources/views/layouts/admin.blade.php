<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Admin Panel - @yield('title')</title>

    <!-- CSS AdminLTE -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte-plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/css/fontawesome.css') }}">
</head>
<body class="layout-fixed layout-navbar-fixed layout-footer-fixed sidebar-mini">
<div class="wrapper">

    @include('layouts.partials.navbar')
    @include('layouts.partials.sidebar')

    <div class="content-wrapper p-3">
        @yield('content')
    </div>

    <footer class="main-footer text-center">
        <small>Portal Berita © {{ date('Y') }}</small>
    </footer>

</div>

<!-- JS AdminLTE -->
<script type="module" src="{{ asset('adminlte/js/adminlte.js') }}"></script>
</body>
</html>
