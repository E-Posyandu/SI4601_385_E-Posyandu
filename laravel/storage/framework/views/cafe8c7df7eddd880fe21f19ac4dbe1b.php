<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-light bg-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading"></div>
                            <a class="nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>" href="<?php echo e(route('admin.dashboard')); ?>">
                                <img src="<?php echo e(asset('assets/home.png')); ?>" alt="Logo" style="height: 25px; margin-right: 8px;">
                                Dashboard
                            </a>
                            <a class="nav-link <?php echo e(request()->routeIs('verifikasi-akun.*') ? 'active' : ''); ?>" href="<?php echo e(route('verifikasi-akun.index')); ?>">
                                <img src="<?php echo e(asset('assets/user.png')); ?>" alt="Logo" style="height: 25px; margin-right: 8px;">
                                Akun Verifikasi
                            </a>
                            <a class="nav-link <?php echo e(request()->routeIs('balita.index') ? 'active' : ''); ?>" href="<?php echo e(route('balita.index')); ?>">
                                <img src="<?php echo e(asset('assets/Baby Feet.png')); ?>" alt="Logo" style="height: 20px; margin-right: 8px;">
                                Data bayi
                            </a>
                            <a class="nav-link <?php echo e(request()->routeIs('report-perkembangan.index') ? 'active' : ''); ?>" href="<?php echo e(route('report-perkembangan.index')); ?>">
                                <img src="<?php echo e(asset('assets/file.png')); ?>" alt="Logo" style="height: 20px; margin-right: 8px;">
                                Report Bayi
                            </a>
                            <a class="nav-link <?php echo e(request()->routeIs('index') ? 'active' : ''); ?>" href="<?php echo e(route('index')); ?>">
                                <img src="<?php echo e(asset('assets/Schedule.png')); ?>" alt="Logo" style="height: 20px; margin-right: 8px;">
                                Jadwal Kegiatan
                            </a>
                            <a class="nav-link <?php echo e(request()->routeIs('artikel.*') ? 'active' : ''); ?>" href="<?php echo e(route('artikel.index')); ?>">
                                <img src="<?php echo e(asset('assets/News.png')); ?>" alt="Logo" style="height: 20px; margin-right: 8px;">
                                Artikel & Edukasi
                            </a>
                            </div>
                    </div>
                </nav>
            </div>
        </div>
<?php /**PATH C:\laragon\www\SI4601_385_E-Posyandu\laravel\resources\views/admin-side/layout-admin/sidebar.blade.php ENDPATH**/ ?>