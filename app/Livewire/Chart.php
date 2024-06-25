<?php

namespace App\Livewire;

use App\Models\Keuangan;
use Livewire\Component;

class Chart extends Component
{
    public $chartData = [];

    public function mount()
    {
        $keuangan = Keuangan::all();
        $data = [
            'label' => [],
            'data' => []
        ];
        
        foreach ($keuangan as $item) {
            $data['label'][] = $item->keterangan;
            $data['data'][] = $item->debet; // Pastikan 'jumlah' adalah kolom yang benar
        }
        
        $this->chartData = json_encode($data);
    }

    public function render()
    {
        return view('livewire.chart');
    }
}