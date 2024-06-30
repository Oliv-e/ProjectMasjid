<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminGambar extends Component
{
    public $gambar, $display, $data_gambar;
    public function mount() {
        $this->data_gambar = \App\Models\Gambar::where('diarsipkan', 'false')->get();
    }
    public function displays($id) {
        $data = \App\Models\Gambar::find($id);
        if ($data->display == 'true') {
            $data->update(['display' => 'false']);
            \App\Models\Log_History::create([
                'bagian' => 'Gambar ID '. $id,
                'aktivitas' => 'Mengedit',
                'oleh' => Auth::user()->name,
                'keterangan' => 'Display : TtF',
                'role' => Auth::user()->role
            ]);
        } else if ($data->display == 'false') {
            $data->update(['display' => 'true']);
            \App\Models\Log_History::create([
                'bagian' => 'Gambar ID '. $id,
                'aktivitas' => 'Mengedit',
                'oleh' => Auth::user()->name,
                'keterangan' => 'Display : FtT',
                'role' => Auth::user()->role
            ]);
        }
        $this->dispatch('gambar_updated');
    }
    public function review() {
        $this->dispatch('gambar_updated');
    }
    public function render()
    {
        return view('livewire.admin-gambar');
    }
}
