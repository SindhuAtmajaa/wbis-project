<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('sbadmin2\vendor\bootstrap\asset\logo_bca_putih.png') }}" alt="Logo BCA"
                        class="img-fluid" style="height: 30px;">
                </div>
                <div class="sidebar-brand-text mx-3">UPPA - BCA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ $menuDashboard ?? '' }}">
                <a class="nav-link" href={{ route('dashboard') }}>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU ADMIN
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item {{ $menuAdminUser?? '' }}">
                <a class="nav-link" href="{{ route('user') }}">
                    <i class="fas fa-users"></i>
                    <span>Data User</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item {{ $menuAdminKjpp?? '' }}">
                <a class="nav-link" href="{{ route('kjpp') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>KJPP</span></a>
            </li>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider d-none d-md-block"> --}}
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MENU KARYAWAN
            </div>

            <!-- Nav Item - Nasabah -->
            <li class="nav-item {{ $menuNasabah?? '' }}">
                <a class="nav-link" href="{{ route('nasabah') }}">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Nasabah</span></a>
            </li>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider d-none d-md-block"> --}}
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->