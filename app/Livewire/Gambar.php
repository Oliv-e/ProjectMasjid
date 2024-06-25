<?php

namespace App\Livewire;

use Livewire\Component;

class Gambar extends Component
{
    public $data_gambar;
    public function mount() {
        $this->data_gambar = \App\Models\Gambar::where('diarsipkan', 'false')->get();
    }
    public function render()
    {
        $this->data_gambar = \App\Models\Gambar::where('diarsipkan', 'false')->get();
        return view('livewire.gambar');
    }
}
