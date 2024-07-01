<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AdminController::class, 'home'])->name('home');
Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/pengumuman', [AdminController::class, 'pengumuman'])->name('pengumuman');
    Route::get('/dashboard/keuangan', [AdminController::class, 'keuangan'])->name('keuangan');
    Route::get('/dashboard/gambar', [AdminController::class, 'gambar'])->name('gambar');
    Route::get('/dashboard/petugas/jumat', [AdminController::class, 'jumat'])->name('petugas.jumat');
    Route::get('/dashboard/gambar/edit/{id}', [AdminController::class, 'editGambar'])->name('gambar.edit');
    Route::post('/dashboard/gambar/edit/{id}', [AdminController::class, 'store'])->name('gambar.store');
    Route::get('/dashboard/gambar/edit/display/{id}', [AdminController::class, 'editDisplay'])->name('gambar.editDisplay');
    Route::get('/dashboard/history', [AdminController::class, 'history'])->name('history');
});
Route::middleware(['is_admin_super_admin'])->group(function () {
    Route::get('/dashboard/manage-user', [AdminController::class, 'manage_user'])->name('manage_user');
    Route::get('/dashboard/manage-user/create', [AdminController::class, 'create_user'])->name('manage_user.create');
    Route::POST('/dashboard/manage-user/create', [AdminController::class, 'store_user'])->name('manage_user.store');
    Route::get('/dashboard/manage-user/edit/{id}', [AdminController::class, 'edit_user'])->name('manage_user.edit');
    Route::POST('/dashboard/manage-user/edit/{id}', [AdminController::class, 'update_user'])->name('manage_user.update');
    Route::get('/dashboard/manage-user/hapus/{id}', [AdminController::class, 'delete_user'])->name('manage_user.delete');
});
Route::middleware(['super_admin'])->group(function() {
    Route::get('/dashboard/recovery', [AdminController::class, 'recovery'])->name('recovery');
});
require __DIR__.'/auth.php';
