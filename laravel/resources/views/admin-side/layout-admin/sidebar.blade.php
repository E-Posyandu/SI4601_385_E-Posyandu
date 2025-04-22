<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-light bg-white" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading"></div>

                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link {{ request()->routeIs('verifikasi-akun.*') ? 'active' : '' }}" href="{{ route('verifikasi-akun.index') }}">
                        <img src="{{ asset('assets/user.png') }}" alt="Logo" style="height: 25px; margin-right: 8px;">
                        Akun Verifikasi
                    </a>

                    <a class="nav-link {{ request()->routeIs('babies.*') ? 'active' : '' }}" href="{{ route('babies.index') }}">
                        <img src="{{ asset('assets/Baby Feet.png') }}" alt="Logo" style="height: 20px; margin-right: 8px;">
                        Data Bayi
                    </a>

                    <a class="nav-link {{ request()->routeIs('jadwal-kegiatan.index') ? 'active' : '' }}" href="{{ route('jadwal-kegiatan.index') }}">
                        <img src="{{ asset('assets/Schedule.png') }}" alt="Logo" style="height: 20px; margin-right: 8px;">
                        Jadwal Kegiatan
                    </a>

                    <a class="nav-link {{ request()->routeIs('artikel.*') ? 'active' : '' }}" href="{{ route('artikel.index') }}">
                        <img src="{{ asset('assets/News.png') }}" alt="Logo" style="height: 20px; margin-right: 8px;">
                        Artikel & Edukasi
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>
