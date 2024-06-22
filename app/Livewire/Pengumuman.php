<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Pengumuman extends Component
{

    public $pengumuman;

    #[On('pengumuman-updated')]
    // public function mount() {
    //     $this->pengumuman = \App\Models\Pengumuman::where('diarsipkan', 'false')->where('display' , 'true')->first();
    // }
    public function render()
    {
        $this->pengumuman = \App\Models\Pengumuman::where('diarsipkan', 'false')->where('display' , 'true')->first();
        return view('livewire.pengumuman');
    }
}
