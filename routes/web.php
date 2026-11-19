<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PublicController;

Route::get('/', function () { return view('welcome'); })->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profil', [AdminController::class, 'profil'])->name('admin.profil');
    Route::put('/admin/profil', [AdminController::class, 'profilUpdate'])->name('admin.profil.update');

    // CRUD Manajemen Admin
    Route::get('/admin/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
    Route::get('/admin/users/create', [AdminController::class, 'usersCreate'])->name('admin.users.create');
    Route::post('/admin/users', [AdminController::class, 'usersStore'])->name('admin.users.store');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'usersEdit'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'usersUpdate'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'usersDestroy'])->name('admin.users.destroy');

    Route::resource('admin/portofolio', PortofolioController::class)->names([
        'index' => 'admin.portofolio.index', 'create' => 'admin.portofolio.create',
        'store' => 'admin.portofolio.store', 'edit' => 'admin.portofolio.edit',
        'update' => 'admin.portofolio.update', 'destroy' => 'admin.portofolio.destroy',
    ]);
});

Route::get('/demo/{template}', function ($template) {
    abort_unless(in_array($template, ['template1', 'template2']), 404);
    $portofolio = (new \App\Models\Portofolio)->forceFill([
        'nama_usaha' => 'NusaRasa Demo', 'bio' => 'Contoh tampilan website.',
        'no_wa' => '6281234567890', 'template' => $template,
    ]);
    return view('Template.' . $template, compact('portofolio'));
})->name('demo');

Route::get('/{slug}', [PublicController::class, 'show'])->name('public.show');