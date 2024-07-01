<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
class Jadwal extends Component
{
    public $data = [];
    public $id_kota = 2014;

    public function mount(){
        $this->fetch();
    }
    public function fetch(){
        $response = Http::get('https://api.myquran.com/v2/sholat/jadwal/'.$this->id_kota.'/'. now()->format('Y-m-d'));
        $jadwal = $response->json()['data']['jadwal'];
        unset($jadwal['tanggal']);
        unset($jadwal['date']);
        unset($jadwal['terbit']);
        $this->data = $jadwal ;
    }
    
    public function render()
    {
        return view('livewire.jadwal');
    }
}
