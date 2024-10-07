<?php

namespace App\Livewire;

use Livewire\Component;

class PetugasJumat extends Component
{
    public $khotib, $imam, $muadzin, $bilal, $data_petugas_jumat, $display, $update = false, $updateId;
    public $type_petugas;
    // public function mount() {

    // }
    // public function tipe_petugas(){
    //     $this-> type_petugas = [App\Livewire\AdminPetugasJumat::class, 'ganti_petugas'];
    // }
    public function render() {
        $this->data_petugas_jumat = \App\Models\PetugasJumat::first();
        if ($this->data_petugas_jumat == null) {
            $this->khotib = "-";
            $this->imam = "-";
            $this->muadzin = "-";
            $this->bilal = "-";
        } else {
            $this->khotib = $this->data_petugas_jumat->khotib;
            $this->imam = $this->data_petugas_jumat->imam;
            $this->muadzin = $this->data_petugas_jumat->muadzin;
            $this->bilal = $this->data_petugas_jumat->bilal;
        }
        return view('livewire.petugas-jumat');
    }
}
