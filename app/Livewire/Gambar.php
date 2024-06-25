<?php

namespace App\Livewire;

use Livewire\Component;

class Gambar extends Component
{
    public $data_gambar;
    // public function mount() {
    //     $this->data_gambar = \App\Models\Gambar::where('diarsipkan', 'false')->where('display', 'true')->get();
    // }
    public function render()
    {
        $this->data_gambar = \App\Models\Gambar::where('diarsipkan', 'false')->where('display', 'true')->get();
        return view('livewire.gambar');
    }
}
