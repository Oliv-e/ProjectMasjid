<?php

namespace App\Livewire;

use Carbon\CarbonInterface;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\carbon;

class AdminPetugasJumat extends Component
{
    public $khotib, $tanggal, $imam, $muadzin, $bilal, $data_petugas_jumat, $display, $data_tanggal, $create = false, $update = false, $updateId, $history;
    public $created_at;
    protected $rules = [
        'khotib' => 'required',
        'imam' => 'required',
        'muadzin' => 'required',
        'bilal' => 'required'
    ];
    public function resetFields() {
        $this->khotib = '';
        $this->imam = '';
        $this->muadzin = '';
        $this->bilal = '';
    }
    public function mount() {
        if (!$this->tanggal) {
            $this->data_petugas_jumat = \App\Models\PetugasJumat::orderBy('created_at', 'desc')->first();
        } else {
            $this->data_petugas_jumat = \App\Models\PetugasJumat::whereDate('created_at', $this->tanggal)->first();
        }
        $this->data_tanggal = \App\Models\PetugasJumat::orderBy('created_at', 'desc')->get();
    }
    public function search() {
        $this->mount();
    }
    public function creates() {
        $created = Carbon::now()->isFriday() ? Carbon::now() : Carbon::now()->next(CarbonInterface::FRIDAY);
        $check_data = \App\Models\PetugasJumat::whereDate('created_at', $created)->first();
        
        if (!$check_data) {
            $this->resetFields();
            $this->create = true;
            $this->update = false;
            $this->created_at = $created->format('d-m-Y');
        } else {
             session()->flash('error','Anda Sudah Menambahkan Data untuk Jumat Depan');
        }
    }
    public function cancel() {
        $this->resetFields();
        $this->create = false;
        $this->update = false;
        $this->created_at = null;
        $this->search();
    }
    public function store() {
        $this->validate();
        try {
            $pjc = \App\Models\PetugasJumat::create([
                'khotib' => $this->khotib,
                'imam' => $this->imam,
                'muadzin' => $this->muadzin,
                'bilal' => $this->bilal,
                'display' => true,
                'created_at' => $this->created_at,
                'updated_at' => now()->format('Y-m-d'),
            ]);
            \App\Models\Log_History::create([
                'bagian' => 'Petugas Jumat ID '. $pjc->id,
                'aktivitas' => 'Membuat',
                'oleh' => Auth::user()->name,
                'keterangan' => ' Khotib : '. $pjc->khotib .' Imam : '. $pjc->imam .' Muadzin : '. $pjc->muadzin .' Bilal : '. $pjc->bilal . ' Tanggal : ' . $pjc->created_at ,
                'role' => Auth::user()->role
            ]);
            session()->flash('success','Data Petugas Berhasil Dibuat!');
            $this->resetFields();
            $this->create = false;
            $this->created_at = null;
            $this->mount();
            $this->dispatch('petugas_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function edit($id) {
        $this->update = true;
        $this->create = false;
        $this->updateId = $id;
        $petugas_jumat = \App\Models\PetugasJumat::find($id);
        $this->khotib = $petugas_jumat->khotib;
        $this->imam = $petugas_jumat->imam;
        $this->muadzin = $petugas_jumat->muadzin;
        $this->bilal = $petugas_jumat->bilal;
        $this->tanggal = $petugas_jumat->created_at;
    }
    public function cancelEdit($id) {
        $this->resetFields();
        $this->create = false;
        $this->update = false;
        $this->updateId = null;
        $this->tanggal = null;
        $this->search();
    }
    public function updates($id) {
        $this->validate();
        try {
            \App\Models\PetugasJumat::find($id)->update([
                'khotib' => $this->khotib,
                'imam' => $this->imam,
                'muadzin' => $this->muadzin,
                'bilal' => $this->bilal,
                'display' => true,
                'updated_at' => now()->format('Y-m-d')
            ]);
            \App\Models\Log_History::create([
                'bagian' => 'Petugas Jumat ID '. $id,
                'aktivitas' => 'Mengedit',
                'oleh' => Auth::user()->name,
                'keterangan' => ' Khotib : '. $this->khotib .' Imam : '. $this->imam .' Muadzin : '. $this->muadzin .' Bilal : '. $this->bilal . ' Tanggal : ' . now()->format('Y-m-d') ,
                'role' => Auth::user()->role
            ]);
            session()->flash('success','Data Petugas Berhasil Diupdate!');
            $this->resetFields();
            $this->update = false;
            $this->tanggal = null;
            $this->mount();
            $this->dispatch('petugas_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function delete($id) {
        $pjd = \App\Models\PetugasJumat::find($id);
        try {
            
            \App\Models\Log_History::create([
                'bagian' => 'Petugas Jumat ID '. $pjd->id,
                'aktivitas' => 'Menghapus',
                'oleh' => Auth::user()->name,
                'keterangan' => 'Khotib : '. $pjd->khotib .' Imam : '. $pjd->imam .' Muadzin : '. $pjd->muadzin .' Bilal : '. $pjd->bilal . ' Tanggal : ' . now()->format('Y-m-d') ,
                'role' => Auth::user()->role
            ]);
            \App\Models\PetugasJumat::find($id)->delete();
            session()->flash('success','Data Petugas Berhasil Dihapus!');
            $this->resetFields();
            $this->tanggal = null;
            $this->mount();
            // $this->dispatch('pengumuman_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function render() {
        return view('livewire.admin-petugas-jumat');
    }
}
