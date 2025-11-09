<?php

use App\Http\Controllers\AccountingController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Auth
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [UserController::class, 'login'])->name('loginPost');

// Middleware
Route::middleware('auth')->group(function() {
    // Logout
    Route::post("/logout", [UserController::class, 'logout'])->name("logoutPost");
    Route::put("/update/user/{routes}", [UserController::class, 'update'])->name("updateUser");

    // Admin
    Route::prefix('/admin')->group(function() {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('adminDashboard');
        
        Route::get('/kas-kecil/pengajuan-kas', [AdminDashboardController::class, 'pengajuanKas'])->name('adminPengajuan');
        Route::post('/kas-kecil/pengajuan-kas', [AdminDashboardController::class, 'addPengajuan'])->name('adminPengajuanPost');

        Route::get('/kas-kecil/pengelolaan-kas', [AdminDashboardController::class, 'pengelolaanKas'])->name('adminPengelolaan');
        Route::post('/kas-kecil/pengelolaan-kas/credit', [AdminDashboardController::class, 'addCredit'])->name('adminPengelolaanCreditPost');
        Route::post('/kas-kecil/pengelolaan-kas/debit', [AdminDashboardController::class, 'addDebit'])->name('adminPengelolaanDebitPost');

        Route::get('/kas-kecil/print/{id}', [AdminDashboardController::class, "print"])->name('adminPengelolaanPrint');
        Route::post('/kas-kecil/pengelolaan-kas/closing', [AdminDashboardController::class, 'closingKas'])->name('adminPengelolaanClosingPost');
        
        Route::get('/laporan', [AdminDashboardController::class, "report"])->name('adminReport');
        Route::get('/kas-kecil/laporan/print/{id}', [AdminDashboardController::class, "reportPrint"])->name('adminReportPrint');
    });

    // Keuangan
    Route::prefix('/keuangan')->group(function() {
        Route::get('/dashboard', [AccountingController::class, 'index'])->name('keuanganDashboard');
        Route::get('/dana', [AccountingController::class, 'dana'])->name('keuanganDana');

        Route::put('/dana/status/{id}', [AccountingController::class, 'status'])->name('keuanganDanaStatus');

        Route::get('/laporan', [AccountingController::class, 'report'])->name('accountingReport');
        Route::get('/laporan/print/{id}', [AccountingController::class, "reportPrint"])->name('accountingReportPrint');
    });

    // Pimpinan
    Route::prefix('/pimpinan')->group(function() {
        Route::get('/dashboard', [LeaderController::class, 'index'])->name('leaderDashboard');
        Route::get('/laporan', [LeaderController::class, 'report'])->name('leaderReport');
        Route::get('/laporan/print/{id}', [LeaderController::class, "reportPrint"])->name('leaderReportPrint');
    });
});