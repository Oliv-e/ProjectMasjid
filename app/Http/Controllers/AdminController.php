<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function gambar() {
        return view('admin.Gambar.home');
    }
    public function editGambar(String $id) {
        $gambar = Gambar::findOrFail($id);
        return view('admin.Gambar.edit', compact('gambar'));
    }
    public function store(Request $request, String $id) {
        $past = Gambar::findOrFail($id);
        // if($past->gambar) {
        //     dd(Storage::delete($past->gambar)); ////-> true
        // }
        $gambar = $request->file('gambar');
        $hash = $gambar->hashName();
        $gambar->storeAs('public',$hash);

        Gambar::whereId($id)->update([
            'gambar' => $hash,
            'display' => $request->display,
        ]);

        return redirect()->route('gambar')->with('success','Gambar Berhasil di Ganti');
    }
}
