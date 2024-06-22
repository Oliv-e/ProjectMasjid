<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
    public function pengumuman() {
        return view('admin.Pengumuman.home');
    }
    public function keuangan() {
        return view('admin.Keuangan.home');
    }
    public function jumat() {
        return view('admin.Petugas.Jumat.home');
    }
}
