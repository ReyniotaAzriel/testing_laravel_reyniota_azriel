<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="{{ ('/') }}" class="brand-link">
            <img src="{{ asset('assets') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow">
            <span class="brand-text fw-light">Azriel RT</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ ('/') }}" class="nav-link active">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">ADMIN</li>

                <li class="nav-item">
                    <a href="{{ ('/admin/user') }}" class="nav-link">
                        <i class="nav-icon bi bi-person"></i>
                        <p>User</p>
                    </a>
                </li>

                <li class="nav-header">MASTER</li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-people"></i>
                        <p>
                            Kependudukan
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ ('/kependudukan/penduduk') }}" class="nav-link ps-5">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Penduduk</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>