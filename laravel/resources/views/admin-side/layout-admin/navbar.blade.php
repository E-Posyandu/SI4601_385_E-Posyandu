<div id="layoutSidenav_nav">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-white">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" style="height: 47px;">
        </a>


        <!-- Sidebar Toggle -->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-lg-0" id="sidebarToggle"><i class="fas fa-bars" style="color: #92949E; font-size: 1.3rem;"></i></button>


        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
</li>

                </ul>
            </li>
        </ul>
    </nav>
</div>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        const sidebarToggle = document.getElementById('sidebarToggle');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', (event) => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
            });
        }
    });
</script>
