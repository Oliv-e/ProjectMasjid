<?php

namespace App\Livewire;

use Livewire\Component;

class PetugasJumat extends Component
{
    public $khotib, $imam, $muadzin, $bilal, $data_petugas_jumat, $display, $update = false, $updateId;
    public function mount() {
        $this->data_petugas_jumat = \App\Models\PetugasJumat::first();
        if ($this->data_petugas_jumat == null) {
            $this->khotib = "Tidak ada data";
            $this->imam = "Tidak ada data";
            $this->muadzin = "Tidak ada data";
            $this->bilal = "Tidak ada data";
        } else {
            $this->khotib = $this->data_petugas_jumat->khotib;
            $this->imam = $this->data_petugas_jumat->imam;
            $this->muadzin = $this->data_petugas_jumat->muadzin;
            $this->bilal = $this->data_petugas_jumat->bilal;
        }
    }
    public function render() {
        return view('livewire.petugas-jumat');
    }
}
