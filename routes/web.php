<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminUserController;

// Halaman Depan
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth Admin
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Area Admin (Wajib Login)
Route::middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Profil Admin (GET untuk lihat, PUT untuk simpan)
    Route::get('/admin/profil', [AdminController::class, 'profil'])->name('admin.profil');
    Route::put('/admin/profil', [AdminController::class, 'updateProfil'])->name('admin.profil.update');

    // Manajemen Admin (Tambah/Hapus Admin)
    Route::resource('admin/users', AdminUserController::class)->names('admin.users')->except(['show', 'edit', 'update']);

    // CRUD Portofolio UMKM
    Route::resource('admin/portofolio', PortofolioController::class)->names([
        'index'   => 'admin.portofolio.index',
        'create'  => 'admin.portofolio.create',
        'store'   => 'admin.portofolio.store',
        'edit'    => 'admin.portofolio.edit',
        'update'  => 'admin.portofolio.update',
        'destroy' => 'admin.portofolio.destroy',
    ]);
    
    // Toggle Publish/Unpublish
    Route::patch('admin/portofolio/{portofolio}/toggle', [PortofolioController::class, 'toggleStatus'])->name('admin.portofolio.toggle');
});

// Rute Publik (WAJIB PALING BAWAH)
Route::get('/{slug}', [PublicController::class, 'show'])->name('public.show');