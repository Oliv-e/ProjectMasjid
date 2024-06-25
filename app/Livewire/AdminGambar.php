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
        $this->resetFields();
        $data = \App\Models\Gambar::find($id);
        $data->update([
            'display' => $this->display
        ]);
    }
    public function render()
    {
        return view('livewire.admin-gambar');
    }
}
