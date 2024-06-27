<?php

namespace App\Livewire;

use Livewire\Component;

class AdminGambar extends Component
{
    public $gambar, $display, $data_gambar;
    public function mount() {
        $this->data_gambar = \App\Models\Gambar::where('diarsipkan', 'false')->get();
    }
    public function displays($id) {
        $data = \App\Models\Gambar::find($id);
        $data->update([
            'display' => $this->display
        ]);
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
