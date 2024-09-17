<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use App\Models\Log_History;
use App\Models\User;
use App\Models\Visible;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function home() {
        return view('page.home.home');
    }
    public function index() {
        $gambar = Gambar::all();
        return view('admin.dashboard', compact('gambar'));
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
        // $past = Gambar::findOrFail($id);
        // if($past->gambar) {
        //     dd(Storage::delete($past->gambar)); ////-> true
        // }
        if($request->gambar) {
            $gambar = $request->file('gambar');
            $hash = $gambar->hashName();
            $gambar->storeAs('public',$hash);

            Gambar::whereId($id)->update([
                'gambar' => $hash,
                'display' => $request->display,
            ]);
            Log_History::create([
                'bagian' => 'Gambar ID '. $id,
                'aktivitas' => 'Mengedit',
                'oleh' => Auth::user()->name,
                'keterangan' => 'Nama Gambar : ' . $gambar->getClientOriginalName() . ' Nama Hash : ' . $hash . ' Display : ' . $request->display ,
                'role' => Auth::user()->role
            ]);
        } else {
            Gambar::whereId($id)->update([
                'display' => $request->display,
            ]);
        }

        return redirect()->route('gambar')->with('success','Gambar Berhasil di Ganti');
    }
    public function editDisplay(Request $request, String $id) {
        // $past = Gambar::findOrFail($id);
        // if($past->gambar) {
        //     dd(Storage::delete($past->gambar)); ////-> true
        // }
        $gambar = Gambar::findOrFail($id);

        if($gambar->display == 'true') {
            $display = 'false';
        } else {
            $display = 'true';
        }

        Gambar::whereId($id)->update([
            'display' => $display,
        ]);
        Log_History::create([
            'bagian' => 'Gambar ID '. $id,
            'aktivitas' => 'Mengedit',
            'oleh' => Auth::user()->name,
            'keterangan' => 'Display : ' . $display ,
            'role' => Auth::user()->role
        ]);

        return redirect()->route('gambar')->with('success','Tampilan Berhasil di Update');
    }

    public function history() {
        $role = Auth::user()->role;
        if ($role == 'moderator') {
            $data = Log_History::where('oleh', Auth::user()->name)->orderBy('id', 'desc')->paginate(15);
        }
        if ($role == 'admin') {
            $data = Log_History::whereIn('role', ['admin', 'moderator'])->orderBy('id', 'desc')->paginate(15);
        }
        if ($role == 'super_admin') {
            $data = Log_History::orderBy('id', 'desc')->paginate(15);
        }

        return view('admin.History.home', compact('data'));
    }
    public function manage_user()  {
        if (Auth::user()->role == 'admin') {
            $data = User::whereIn('role', ['admin', 'moderator'])->get();
        } else if (Auth::user()->role = 'super_admin') {
            $data = User::all();
        }
        return view('admin.Akun.home', compact('data'));
    }
    public function create_user()  {
        return view('admin.Akun.create');
    }
    public function store_user(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ]);
        if ($request->password != $request->password_confirmation) {
            return redirect()->route('manage_user.create')->with('error', 'Password Tidak Sama');
        }
        $uid = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        if ($request->role) {
            $uid->update([
                'role' => $request->role,
            ]);
        }
        if ($request->eva) {
            $uid->update([
                'email_verified_at' => $request->eva
            ]);
        }
        return redirect()->route('manage_user')->with('success', 'Akun Berhasil Dibuat!');
    }
    public function edit_user($id)  {
        $data = User::where('id', $id)->first();
        return view('admin.Akun.edit', compact('data'));
    }
    public function update_user($id, Request $request)  {
        $data = User::findOrFail($id);
        $this->validate($request,[
            'name' => 'required',
            'email' => ['required','email',Rule::unique('users')->ignore($data->id)]
        ]);
        $data->update([
            'name' => $request->name,
        ]);
        if ($request->password) {
            $data->update([
                'password' => Hash::make($request->password)
            ]);
        }
        if ($request->email != $data->email) {
            $data->update([
                'email' => $request->email,
                'email_verified_at' => null
            ]);
        }
        if ($request->role) {
            $data->update([ 'role' => $request->role ]);
        }
        if ($request->eva) {
            $data->update([ 'email_verified_at' => $request->eva ]);
        }
        return redirect()->route('manage_user')->with('success', 'Data Berhasil di Perbaharui');
    }
    public function delete_user($id)  {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('manage_user')->with('success', 'Akun Berhasil di Hapus');
    }
    public function recovery() {
        return view('admin.Recovery.home');
    }

    // settings

    public function settings() {
        return view('admin.Settings.home');
    }
    public function settings_change_name(Request $request) {
        $text = '"' . $request->input('nama_masjid') . '"';
        $this->updateEnvFile('APP_NAME', $text);
        return redirect()->back()->with('success', 'Nama Berhasil diganti');
    }
    private function updateEnvFile($key, $value)
    {
        $envFile = app()->environmentFilePath();
        $content = file($envFile);
        foreach ($content as $lineNumber => $line) {
            if (strpos($line, $key) !== false) {
                $content[$lineNumber] = $key . '=' . $value . "\n";
                break;
            }
        }
        file_put_contents($envFile, implode('', $content));
    }
}
