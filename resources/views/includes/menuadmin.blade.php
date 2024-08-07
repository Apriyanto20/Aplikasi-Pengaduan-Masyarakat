<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="APM Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">APM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>
        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">MASTER DATA</li>
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/masyarakat" class="nav-link {{ Request::is('masyarakat*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Masyarakat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pegawai" class="nav-link {{ Request::is('pegawai*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kategori" class="nav-link {{ Request::is('kategori*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Kategori Pengaduan
                        </p>
                    </a>
                </li>
                <li class="nav-header">LAPORAN</li>
                <li class="nav-item">
                    <a href="/laporanmasuk" class="nav-link {{ Request::is('laporanmasuk*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Laporan Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-header">Report</li>
                <li class="nav-item">
                    <a href="/generatereport" class="nav-link {{ Request::is('generatereport*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Generate Report
                        </p>
                    </a>
                </li>
                <li class="nav-header">Account</li>
                <li class="nav-item">
                    <a href="/profile" class="nav-link {{ Request::is('profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>
                {{-- <form action="/logout" method="POST">
                    @csrf --}}
                <button class="btn btn-secondary btn-md" type="button" data-toggle="modal" data-target="#modalLogout">
                    <li class="fa fa-sign-out-alt" data-bs-toggle="modal" data-bs-target="#staticBackdrop"></li>
                    Logout
                </button>
                {{-- </form> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
