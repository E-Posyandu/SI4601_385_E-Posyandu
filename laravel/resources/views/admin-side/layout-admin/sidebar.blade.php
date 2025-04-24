<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light bg-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">
                                <img src="{{ asset('assets/home.png') }}" alt="Logo" style="height: 25px; margin-right: 8px;">
                                Dashboard
                            </a>
                           <a class="nav-link {{ request()->routeIs('verifikasi-akun.index') ? 'active' : '' }}" href="{{ route('verifikasi-akun.index') }}">
                                <img src="{{ asset('assets/user.png') }}" alt="Logo" style="height: 25px; margin-right: 8px;">
                                Akun Verifikasi
                            </a>
                            <a class="nav-link {{ request()->routeIs('balita.index') ? 'active' : '' }}" href="{{ route('balita.index') }}">
                                <img src="{{ asset('assets/Baby Feet.png') }}" alt="Logo" style="height: 20px; margin-right: 8px;">
                                Data bayi
                            </a>
                            <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}" href="{{ route('index') }}">
                                <img src="{{ asset('assets/Schedule.png') }}" alt="Logo" style="height: 20px; margin-right: 8px;">
                                Jadwal Kegiatan
                            </a>
                            <a class="nav-link {{ request()->routeIs('artikel.index') ? 'active' : '' }}" href="{{ route('artikel.index') }}">
                                <img src="{{ asset('assets/News.png') }}" alt="Logo" style="height: 20px; margin-right: 8px;">
                                Artikel & Edukasi
                            </a>
                            </div>
                    </div>
                </nav>
            </div>
        </div>
