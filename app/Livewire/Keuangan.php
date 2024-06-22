<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class Keuangan extends Component
{
    public $data_keuangan;
    public $data_saldo = [];
    #[On('keuangan_updated')]
    // public function mount() {
    //     $this->data_keuangan = \App\Models\Keuangan::where('diarsipkan', 'false')->orderBy('created_at', 'desc')->limit(5)->get();
    //     $data_uang = \App\Models\Keuangan::where('diarsipkan', 'false')->orderBy('created_at', 'asc')->get();
    //     foreach($data_uang as $index => $data) {
    //         if ($data->debet) {
    //             $this->saldo += $data->debet;
    //         } elseif ($data->kredit) {
    //             $this->saldo -= $data->kredit;
    //         }
    //         $this->data_saldo[] = $this->saldo;
    //     }
    //     $this->data_saldo = array_reverse($this->data_saldo);
    // }
    public function render()
    {
        $saldo = 0;
        $this->data_keuangan = \App\Models\Keuangan::where('diarsipkan', 'false')->orderBy('created_at', 'desc')->limit(5)->get();
        $data_uang = \App\Models\Keuangan::where('diarsipkan', 'false')->orderBy('created_at', 'asc')->get();
        foreach($data_uang as $index => $data) {
            if ($data->debet) {
                $saldo += $data->debet;
            } elseif ($data->kredit) {
                $saldo -= $data->kredit;
            }
            $this->data_saldo[] = $saldo;
        }
        $this->data_saldo = array_reverse($this->data_saldo);
        return view('livewire.keuangan');
    }
}
