<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light bg-white" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading"></div>
                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('assets/home.png') }}" alt="Logo" style="height: 25px; margin-right: 8px;">
                        Dashboard
                    </a>
                    <a class="nav-link {{ request()->routeIs('verifikasi-akun.index') ? 'active' : '' }}" href="{{ route('verifikasi-akun.index') }}">
                        <img src="{{ asset('assets/user.png') }}" alt="Logo" style="height: 25px; margin-right: 8px;">
                        Akun Verifikasi
                    </a>
                    <a class="nav-link {{ request()->routeIs('Databalita.index') ? 'active' : '' }}" href="{{ route('Databalita.index') }}">
                        <img src="{{ asset('assets/Baby Feet.png') }}" alt="Logo" style="height: 20px; margin-right: 8px;">
                        Data Bayi
                    </a>
                    <a class="nav-link {{ request()->routeIs('kunjungan.index') ? 'active' : '' }}" href="{{ route('kunjungan.index') }}">
                        <img src="{{ asset('assets/healthcare.png') }}" alt="Logo" style="height: 20px; margin-right: 8px;">
                        Kunjungan
                    </a>
                    <a class="nav-link {{ request()->routeIs('jadwal-kegiatan.index') ? 'active' : '' }}" href="{{ route('jadwal-kegiatan.index') }}">
                        <img src="{{ asset('assets/Schedule.png') }}" alt="Logo" style="height: 20px; margin-right: 8px;">
                        Jadwal Kegiatan
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
