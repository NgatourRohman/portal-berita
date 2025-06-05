<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{ asset('adminlte/assets/img/AdminLTELogo.png') }}" alt="Logo"
                class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">Portal Berita</span>
        </a>
    </div>

    <!-- Sidebar Wrapper -->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('news.index') }}"
                        class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-newspaper"></i>
                        <p>Berita</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>Kategori</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}"
                        class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-circle"></i>
                        <p>Profil Saya</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                        class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people-fill"></i>
                        <p>Manajemen User</p>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="nav-link btn w-100 text-start text-white bg-danger">
                            <i class="nav-icon bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
</aside>
