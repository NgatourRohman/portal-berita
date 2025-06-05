<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        {{-- Navbar --}}
        @include('layouts.partials.navbar')

        {{-- Sidebar --}}
        @include('layouts.partials.sidebar')

        {{-- Main Content --}}
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>

        {{-- Footer --}}
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">Portal Berita</div>
            <strong>&copy; {{ date('Y') }} Portal Berita</strong>. All rights reserved.
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js">
    </script>
    <script type="module" src="{{ asset('adminlte/js/adminlte.js') }}"></script>
</body>

</html>
