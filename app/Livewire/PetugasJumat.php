<?php

namespace App\Livewire;

use Livewire\Component;

class PetugasJumat extends Component
{
    public $khotib, $imam, $muadzin, $bilal, $data_petugas_jumat, $display, $update = false, $updateId;
    public function mount() {
        $this->data_petugas_jumat = \App\Models\PetugasJumat::first();
    }
    public function render() {
        return view('livewire.petugas-jumat');
    }
}
