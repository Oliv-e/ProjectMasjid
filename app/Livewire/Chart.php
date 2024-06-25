<?php

namespace App\Livewire;

use App\Models\Keuangan;
use App\Models\User;
use Livewire\Component;

class Chart extends Component
{
    public $chartData = [];

    public function mount()
    {
        // $this->chartData = Keuangan::all()->toArray();
        // $this->chartData = [
        //     ['label' => 'January', 'value' => 65],
        //     ['label' => 'February', 'value' => 59],
        //     ['label' => 'March', 'value' => 80],
        //     ['label' => 'April', 'value' => 81],
        //     ['label' => 'May', 'value' => 56],
        //     ['label' => 'June', 'value' => 55],
        //     ['label' => 'July', 'value' => 40]
        // ];
        // Mengambil data dari model Keuangan
        $keuangans = Keuangan::select('keterangan', 'saldo')->get();

        // Mengubah format data ke format yang diperlukan untuk Chart.js
        $this->chartData = $keuangans->map(function ($keuangan) {
            return [
                'label' => $keuangan->keterangan,
                'value' => $keuangan->saldo,
            ];
        })->toArray();
    }
    public function render()
    {
        return view('livewire.chart');
    }
}
