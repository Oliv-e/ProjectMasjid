<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Gambar extends Component
{
    public $data_gambar;
    public $avail;
    #[On('gambar_updated')]
    // public function mount() {
    //     $this->data_gambar = \App\Models\Gambar::where('diarsipkan', 'false')->where('display', 'true')->get();
    // }
    
    public function render()
    {
        $this->data_gambar = \App\Models\Gambar::where('diarsipkan', 'false')->where('display', 'true')->get();
        return view('livewire.gambar');
    }
}
