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
Route::middleware(['super_admin'])->group(function() {
    Route::get('/text', function() {
        return view('page.home.home');
    });
});
require __DIR__.'/auth.php';
