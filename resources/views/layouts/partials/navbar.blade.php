<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">

        {{-- Toggle Sidebar --}}
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
            </li>
        </ul>

        {{-- User Menu Right --}}
        <ul class="navbar-nav ms-auto">
            {{-- Fullscreen --}}
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>

        </ul>

    </div>
</nav>
