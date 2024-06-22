<?php

namespace App\Livewire;

use Livewire\Component;

class AdminPetugasJumat extends Component
{
    public $khotib, $imam, $muadzin, $bilal, $data_petugas_jumat, $display, $update = false, $updateId;
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
        $this->data_petugas_jumat = \App\Models\PetugasJumat::first();
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
    }
    public function cancelEdit($id) {
        $this->resetFields();
        $this->create = false;
        $this->update = false;
        $this->updateId = null;
    }
    public function updates($id) {
        $this->validate();
        try {
            \App\Models\PetugasJumat::find($id)->update([
                'khotib' => $this->khotib,
                'imam' => $this->imam,
                'muadzin' => $this->muadzin,
                'bilal' => $this->bilal
            ]);
            session()->flash('success','Data Petugas Berhasil Diupdate!');
            $this->resetFields();
            $this->update = false;
            $this->mount();
            // $this->dispatch('pengumuman_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function bersihkan($id) {
        try {
            \App\Models\PetugasJumat::find($id)->update([
                'khotib' => null,
                'imam' => null,
                'muadzin' => null,
                'bilal' => null
            ]);
            session()->flash('success','Data Petugas Berhasil Dikosongkan!');
            $this->resetFields();
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
