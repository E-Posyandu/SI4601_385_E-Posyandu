<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Posyandu - Sistem Informasi Posyandu dan Balita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Hero Section with Responsive Navbar -->
    <header class="bg-gradient-to-b from-blue-600 to-blue-700 text-white">
        <!-- Responsive Navbar -->
        <nav class="bg-white shadow-md w-full z-50 lg:relative fixed">
            <div class="container mx-auto px-4 md:px-6 lg:px-[150px]">
                <div class="flex justify-between items-center h-16">
                    <div class="text-xl font-bold text-blue-600">E-Posyandu</div>
                    
                    <!-- Mobile Menu Button -->
                    <button class="lg:hidden text-blue-600" onclick="toggleMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-16 6h16"></path>
                        </svg>
                    </button>

                    <!-- Desktop Menu -->
                    <div class="hidden lg:flex items-center space-x-8 justify-center flex-1">
                        <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors">Beranda</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors">Layanan</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors">Tentang</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors">Kontak</a>
                    </div>

                    <!-- Login/Register Buttons -->
                    <div class="hidden lg:flex space-x-4">
                        <a href="{{ route('user.login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">Masuk</a>
                        <a href="{{ route('user.register') }}" class="border-2 border-blue-600 text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition-colors">Daftar</a>
                    </div>
                </div>

                <!-- Mobile Menu (Hidden by default) -->
                <div id="mobileMenu" class="hidden lg:hidden mt-2 pb-4">
                    <div class="flex flex-col space-y-4">
                        <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors px-2 py-1">Beranda</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors px-2 py-1">Layanan</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors px-2 py-1">Tentang</a>
                        <a href="#" class="text-gray-700 hover:text-blue-600 transition-colors px-2 py-1">Kontak</a>
                        <div class="flex flex-col space-y-2 pt-2">
                            <a href="{{ route('user.login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors text-center">Masuk</a>
                            <a href="{{ route('user.register') }}" class="border-2 border-blue-600 text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition-colors text-center">Daftar</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Content -->
        <div class="container mx-auto px-4 md:px-6 lg:px-[150px] pt-24 pb-12 md:py-20 md:my-12">
            <!-- Mobile Version (Default) -->
            <div class="lg:hidden text-center">
                <h1 class="text-3xl font-bold mb-4">Selamat Datang di E-Posyandu</h1>
                <p class="text-lg mb-6">Sistem Informasi Terpadu untuk Pemantauan Kesehatan Ibu dan Balita</p>
                <img src="assets/jpg2png/balita.png" alt="Posyandu" class="w-full max-w-sm mx-auto h-auto object-contain mb-6">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('user.login') }}" class="bg-white text-blue-600 px-6 py-2 rounded-lg font-semibold hover:bg-blue-50 transition-colors">Masuk</a>
                    <a href="{{ route('user.register') }}" class="border-2 border-white text-white px-6 py-2 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">Daftar</a>
                </div>
            </div>

            <!-- Desktop Version -->
            <div class="hidden lg:flex flex-wrap items-center">
                <div class="w-1/2 pr-8">
                    <h1 class="text-4xl font-bold mb-4">Selamat Datang di E-Posyandu</h1>
                    <p class="text-xl mb-6">Sistem Informasi Terpadu untuk Pemantauan Kesehatan Ibu dan Balita</p>
                    <!-- Login/Register Buttons -->
                    <div class="hidden lg:flex space-x-4">
                        <a href="{{ route('user.login') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">Masuk</a>
                        <a href="{{ route('user.register') }}" class="border-2 border-blue-600 text-blue-600 px-4 py-2 rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition-colors">Daftar</a>
                    </div>
                </div>
                <div class="w-1/2">
                    <img src="assets/jpg2png/balita.png" alt="Posyandu" class="w-full max-w-lg mx-auto h-auto object-contain">
                </div>
            </div>
        </div>
    </header>

    <!-- JavaScript for Mobile Menu Toggle -->
    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }
    </script>

    <!-- Feature Section -->
    <section class="py-20">
        <div class="container mx-auto px-4 md:px-6 lg:px-[150px]">
            <h2 class="text-3xl font-bold text-center mb-12">Feature Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h5 class="text-xl font-semibold mb-3">User Orang Tua</h5>
                        <ul class="text-gray-600 mb-4 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Pantau pertumbuhan balita
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Lihat jadwal imunisasi
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Riwayat kesehatan
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <h5 class="text-xl font-semibold mb-3">Kader Posyandu</h5>
                        <ul class="text-gray-600 mb-4 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Kelola data balita
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Atur jadwal imunisasi
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Laporan kesehatan
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                        </svg>
                        <h5 class="text-xl font-semibold mb-3">Admin</h5>
                        <ul class="text-gray-600 mb-4 space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Manajemen pengguna
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Kelola data master
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Monitoring sistem
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- User Section -->
    <section class="py-20">
        <div class="container mx-auto px-4 md:px-6 lg:px-[150px]">
            <h2 class="text-3xl font-bold text-center mb-12">Sistem Layanan Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h5 class="text-xl font-semibold mb-3">User Orang Tua</h5>
                        <p class="text-gray-600 text-center mb-4">Pantau tumbuh kembang balita secara berkala dengan 1 kali tekan</p>
                        <a href="#" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">Pelajari</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        <h5 class="text-xl font-semibold mb-3">Kader Posyandu</h5>
                        <p class="text-gray-600 text-center mb-4">Jadwal dan riwayat imunisasi balita dan Sistem Informasi Posyandu</p>
                        <a href="{{ route('kader.login') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">Pelajari</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex flex-col items-center">
                        <svg class="w-12 h-12 text-blue-600 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                        </svg>
                        <h5 class="text-xl font-semibold mb-3">Admin</h5>
                        <p class="text-gray-600 text-center mb-4">Akses ke semua fitur Sistem Informasi Posyandu</p>
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors">Pelajari</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2023 E-Posyandu. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
