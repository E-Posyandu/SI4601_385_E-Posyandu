<aside class="bg-dark text-white vh-100 position-fixed top-0 start-0 shadow-lg transition-all duration-300" 
       id="sidebar" 
       style="width: 250px; z-index: 1000;">
    <div class="p-4 d-flex justify-content-between align-items-center">
        <!-- Logo atau Judul -->
        <h1 class="h4 fw-bold mb-0 text-warning">E-Posyandu</h1>
        <!-- Tombol Toggle untuk Mobile -->
        <button class="btn btn-outline-light d-md-none" type="button" id="sidebarToggle">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <nav class="mt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" 
                   class="nav-link text-white py-3 px-4 d-flex align-items-center {{ request()->routeIs('dashboard') ? 'bg-primary' : '' }} hover-bg-primary transition-colors">
                    <svg class="me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10M9 21h6"></path>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user-side.dailyReport.index') }}" dusk = 'buttondailyreport'
                   class="nav-link text-white py-3 px-4 d-flex align-items-center {{ request()->routeIs('dailyReport.index') ? 'bg-primary' : '' }} hover-bg-primary transition-colors">
                    <svg class="me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Report Daily
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('posyandureport') }}" 
                   class="nav-link text-white py-3 px-4 d-flex align-items-center {{ request()->routeIs('posyandureport') ? 'bg-primary' : '' }} hover-bg-primary transition-colors">
                    <svg class="me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Report Posyandu
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('event') }}" 
                   class="nav-link text-white py-3 px-4 d-flex align-items-center {{ request()->routeIs('events') ? 'bg-primary' : '' }} hover-bg-primary transition-colors">
                    <svg class="me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Jadwal Kegiatan
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('profile') }}" 
                   class="nav-link text-white py-3 px-4 d-flex align-items-center {{ request()->routeIs('profile') ? 'bg-primary' : '' }} hover-bg-primary transition-colors">
                    <svg class="me-2" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Profile
                </a>
            </li>
        </ul>
    </nav>
</aside>

<style>
    .hover-bg-primary:hover {
        background-color: #0d6efd; /* Warna primary Bootstrap */
        transition: background-color 0.3s ease;
    }
    .hover-bg-danger:hover {
        background-color: #dc3545; /* Warna danger Bootstrap */
        transition: background-color 0.3s ease;
    }
    .transition-colors {
        transition: background-color 0.3s ease;
    }

    /* Responsif untuk mobile */
    @media (max-width: 767.98px) {
        #sidebar {
            width: 0;
            overflow: hidden;
        }
        #sidebar.active {
            width: 250px;
        }
        main {
            margin-left: 0 !important;
        }
    }
    @media (min-width: 768px) {
        #sidebar {
            width: 250px;
        }
    }
</style>