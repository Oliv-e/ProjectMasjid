<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('page.home.home');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/pengumuman', [AdminController::class, 'pengumuman'])->name('pengumuman');
    Route::get('/dashboard/keuangan', [AdminController::class, 'keuangan'])->name('keuangan');
    Route::get('/dashboard/petugas/jumat', [AdminController::class, 'jumat'])->name('petugas.jumat');
});

require __DIR__.'/auth.php';
