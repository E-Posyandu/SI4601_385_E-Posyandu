<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerifikasiAkunController;
use App\Http\Controllers\JadwalKegiatanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\dashboardUserController;
use App\Http\Controllers\dailyreportUserController;
use App\Http\Controllers\posyandureportUserController;
use App\Http\Controllers\eventUserController;
use App\Http\Controllers\profileUserController;
use App\Http\Controllers\ReportPerkembanganController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\VisitedController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\Kader\KunjunganController;
use App\Http\Controllers\Kader\DatabalitaController;
use App\Http\Controllers\Kader\ReportkunjunganController;

// AUTH
use App\Http\Controllers\Auth\AuthKaderController;
use App\Http\Controllers\Auth\AuthUserController;

// TAMPILAN INDEX LANDING PAGE ALL 
Route::get('/', function () {
    return view('index');
});

// LOGIN ADMIN
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

// LOGIN KADER
Route::group(['prefix' => 'kader'], function () {
    // Auth routes
    Route::get('/login', [AuthKaderController::class, 'showLoginForm'])->name('kader.login');
    Route::post('/login', [AuthKaderController::class, 'login'])->name('kader.login.submit');
    Route::get('/register', [AuthKaderController::class, 'showRegistrationForm'])->name('kader.register');
    Route::post('/register', [AuthKaderController::class, 'register'])->name('kader.register.submit');
    Route::post('/logout', [AuthKaderController::class, 'logout'])->name('kader.logout');

    // Dashboard
    Route::get('/dashboard', [KaderController::class, 'index'])->name('kader-side.dashboard');

    // Kunjungan routes
    Route::prefix('kunjungan')->group(function () {
        Route::get('/', [KunjunganController::class, 'index'])->name('kunjungan.index');
        Route::get('/create', [KunjunganController::class, 'create'])->name('kunjungan.create');
        Route::post('/', [KunjunganController::class, 'store'])->name('kunjungan.store');
        Route::get('/{id}/edit', [KunjunganController::class, 'edit'])->whereNumber('id')->name('kunjungan.edit');
        Route::put('/{id}', [KunjunganController::class, 'update'])->whereNumber('id')->name('kunjungan.update');
        Route::delete('/{id}', [KunjunganController::class, 'destroy'])->whereNumber('id')->name('kunjungan.destroy');
        Route::get('/{id}', [KunjunganController::class, 'show'])->whereNumber('id')->name('kunjungan.show');
    });
    Route::prefix('DataBalita')->group(function() {
        Route::get('/', [DatabalitaController::class, 'index'])->name('Databalita.index');
        Route::get('/create', [DatabalitaController::class, 'create'])->name('Databalita.create');
        Route::post('/', [DatabalitaController::class, 'store'])->name('Databalita.store');
        Route::get('/{id}', [DatabalitaController::class, 'show'])->name('Databalita.show');
        Route::get('/{id}/edit', [DatabalitaController::class, 'edit'])->name('Databalita.edit');
        Route::put('/{id}', [DatabalitaController::class, 'update'])->name('Databalita.update');
        Route::delete('/{id}', [DatabalitaController::class, 'destroy'])->name('Databalita.destroy');
    });

    Route::resource('report-kunjungan', ReportkunjunganController::class);
});


// LOGIN USER
Route::group(['prefix' => 'user'], function () {
    Route::get('/login', [AuthUserController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [AuthUserController::class, 'login'])->name('user.login.submit');
    Route::get('/register', [AuthUserController::class, 'showRegistrationForm'])->name('user.register');
    Route::post('/register', [AuthUserController::class, 'register'])->name('user.register.submit');
    Route::post('/logout', [AuthUserController::class, 'logout'])->name('user.logout');

    // ROUTING DASHBOARD

    // ROUTING FITUR DAILY REPORT

    // ROUTING FITUR REPORT POSYANDU

    // ROUTING JADWAL POSYANDU

    // ROUTING PROFILE
    
});


// Dashboard Routes
// Route::get('/dashboard', [dashboardUserController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/dashboard', [dashboardUserController::class, 'index'])->name('dashboard');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('admin.dashboard');

// User-side Routes
Route::prefix('user-side')->group(function () {
    // Daily Report Routes
    Route::prefix('dailyreport')->group(function () {
        Route::get('/', [dailyreportUserController::class, 'index'])->name('user-side.dailyReport.index');
        Route::get('/create', [dailyreportUserController::class, 'create'])->name('user-side.dailyReport.create');
        Route::post('/', [dailyreportUserController::class, 'store'])->name('user-side.dailyReport.store');
        Route::get('/{id}', [dailyreportUserController::class, 'show'])->name('user-side.dailyReport.show');
        Route::get('/{id}/edit', [dailyreportUserController::class, 'edit'])->name('user-side.dailyReport.edit');
        Route::put('/{id}', [dailyreportUserController::class, 'update'])->name('user-side.dailyReport.update');
    });
});

// User Features Routes
Route::get('/posyandureport', [posyandureportUserController::class, 'index'])->name('posyandureport');
Route::get('/event', [eventUserController::class, 'index'])->name('event');
Route::get('/profile', [profileUserController::class, 'index'])->name('profile');

// Account Verification Routes
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/akun-verifikasi', [VerifikasiController::class, 'index'])->name('accountVerification.index');
//     Route::patch('/akun-verifikasi/{id}/approve', [VerifikasiController::class, 'approve'])->name('accountVerification.approve');
//     Route::patch('/akun-verifikasi/{id}/reject', [VerifikasiController::class, 'reject'])->name('accountVerification.reject');
// });


// Di dalam group middleware admin
Route::prefix('verifikasi-akun')->group(function () {
    Route::get('/', [VerifikasiAkunController::class, 'index'])
         ->name('verifikasi-akun.index'); // NAMA ROUTE

    Route::get('/{id_balita}', [VerifikasiAkunController::class, 'show'])
         ->name('verifikasi-akun.show');

    Route::post('/{id_balita}/update-status', [VerifikasiAkunController::class, 'updateStatus'])
         ->name('verifikasi-akun.update-status');
});




// Article Routes
Route::prefix('artikel')->group(function() {
    Route::get('/', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    Route::get('/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
});

// Baby Management Routes
Route::prefix('DataBalita')->group(function() {
    Route::get('/', [BalitaController::class, 'index'])->name('balita.index');
    Route::get('/create', [BalitaController::class, 'create'])->name('balita.create');
    Route::post('/', [BalitaController::class, 'store'])->name('balita.store');
    Route::get('/{id}', [BalitaController::class, 'show'])->name('balita.show');
    Route::get('/{id}/edit', [BalitaController::class, 'edit'])->name('balita.edit');
    Route::put('/{id}', [BalitaController::class, 'update'])->name('balita.update');
    Route::delete('/{id}', [BalitaController::class, 'destroy'])->name('balita.destroy');
});

// Admin Verification Routes
//Route::prefix('admin')->group(function() {
//    Route::get('/verifikasi-akun', [VerifikasiAdminController::class, 'index'])->name('verifikasi-akun.index');
//    Route::post('/verifikasi-akun/save', [VerifikasiAdminController::class, 'saveStatus'])->name('verifikasi-akun.saveStatus');
//});

// Dashboard Admin Route
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');


Route::prefix('jadwal-kegiatan')->group(function () {
    // Lihat daftar jadwal kegiatan
    Route::get('/', [JadwalKegiatanController::class, 'index'])->name('jadwal-kegiatan.index');

    // Form tambah jadwal kegiatan
    Route::get('/create', [JadwalKegiatanController::class, 'create'])->name('jadwal-kegiatan.create');

    // Simpan jadwal kegiatan baru
    Route::post('/', [JadwalKegiatanController::class, 'store'])->name('jadwal-kegiatan.store');

    // Form edit jadwal kegiatan
    Route::get('/{jadwal}/edit', [JadwalKegiatanController::class, 'edit'])->name('jadwal-kegiatan.edit');

    // Update jadwal kegiatan
    Route::put('/{jadwal}', [JadwalKegiatanController::class, 'update'])->name('jadwal-kegiatan.update');



    // Hapus jadwal kegiatan
    Route::delete('/{jadwal}', [JadwalKegiatanController::class, 'destroy'])->name('jadwal-kegiatan.destroy');

});

// Report Perkembangan Bayi
Route::resource('report-perkembangan', ReportPerkembanganController::class);


// Router Kunjungan 
Route::prefix('visited')->group(function () {
    Route::get('/', [VisitedController::class, 'index'])->name('visited.index');
    Route::get('/create', [VisitedController::class, 'create'])->name('visited.create');
    Route::post('/', [VisitedController::class, 'store'])->name('visited.store');
    Route::get('/{id}/edit', [VisitedController::class, 'edit'])->name('visited.edit');
    Route::put('/{id}', [VisitedController::class, 'update'])->name('visited.update');
    Route::delete('/{id}', [VisitedController::class, 'destroy'])->name('visited.destroy');
    Route::get('/{id}', [VisitedController::class, 'show'])->name('visited.show');
});


//Route Posyandu

Route::prefix('posyandu')->group(function () {
    Route::get('/', [PosyanduController::class, 'index'])->name('posyandu.index');
    Route::get('/create', [PosyanduController::class, 'create'])->name('posyandu.create');
    Route::post('/', [PosyanduController::class, 'store'])->name('posyandu.store');
    Route::get('/{id}/edit', [PosyanduController::class, 'edit'])->name('posyandu.edit');
    Route::put('/{id}', [PosyanduController::class, 'update'])->name('posyandu.update');
    Route::delete('/{id}', [PosyanduController::class, 'destroy'])->name('posyandu.destroy');
    Route::get('/{id}', [PosyanduController::class, 'show'])->name('posyandu.show');
});
