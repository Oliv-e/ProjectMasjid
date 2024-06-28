<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class AdminKeuangan extends Component
{
    public $year, $month, $data_keuangan, $dibuat, $type, $debet, $kredit, $saldo, $keterangan, $updateId, $preview;
    public $data_saldo;
    public $create , $update = false;
    public function mount() {
        if (!$this->year) {
            $this->year = date('Y');
        }
        if (!$this->month) {
            $this->month = date('m');
        }

        $this->data_keuangan = \App\Models\Keuangan::where('diarsipkan', 'false')
        ->whereYear('created_at', $this->year)
        ->whereMonth('created_at', $this->month)
        ->orderBy('created_at', 'desc')
        ->get();

        $this->saldo = 0;
        $this->data_saldo = [];

        $data_uang = \App\Models\Keuangan::where('diarsipkan', 'false')
        ->whereYear('created_at', $this->year)
        ->whereMonth('created_at', '<=', $this->month)
        ->orderBy('created_at', 'asc')
        ->get();

        foreach($data_uang as $index => $data) {
            if ($data->debet) {
                $this->saldo += $data->debet;
            } elseif ($data->kredit) {
                $this->saldo -= $data->kredit;
            }
            $this->data_saldo[] = $this->saldo;
        }
        $this->data_saldo = array_reverse($this->data_saldo);
    }
    protected $rules = [
        'type' => 'required',
        'debet' => 'integer',
        'kredit' => 'integer',
        'keterangan' => 'string'
    ];
    public function resetFields() {
        $this->type = '';
        $this->debet = '';
        $this->saldo = 0;
        $this->kredit = '';
        $this->keterangan = '';
    }
    public function search() {
        $this->mount();
    }
    public function new() {
        $this->create = true;
        $this->update = false;
    }
    public function store() {
        try {
            if ($this->type == 'debet') {
                $this->kredit = null;
            } else if ($this->type == 'kredit') {
                $this->debet = null;
            }
            \App\Models\Keuangan::create([
                'debet' => $this->debet,
                'kredit' => $this->kredit,
                'keterangan' => $this->keterangan,
                'diarsipkan' => 'false',
                'created_at' => Carbon::parse($this->dibuat)->format('Y-m-d H:i:s'),
                'updated_at' => $this->dibuat,
            ]);
            session()->flash('success','Data Keuangan Berhasil Ditambah!');
            $this->resetFields();
            $this->create = false;
            $this->mount(); //Bisa juga lempar ke mount...
            $this->dispatch('keuangan_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function cancel() {
        $this->create = false;
        $this->update = false;
    }
    public function edit($id) {
        $this->update = true;
        $this->create = false;
        $this->updateId = $id;
        $data = \App\Models\Keuangan::find($id);
        if ($data->debet != null) {
            $this->type = 'debet';
            $this->debet = $data->debet;
            $this->kredit = null;
        } else {
            $this->type = 'kredit';
            $this->kredit = $data->kredit;
            $this->debet = null;
        }
        $this->keterangan = $data->keterangan;
        $this->dibuat = Carbon::parse($data->created_at)->format('Y-m-d');
    }
    public function cancelEdit($id) {
        $this->resetFields();
        $this->create = false;
        $this->update = false;
        $this->updateId = null;
    }
    public function updates($id) {
        try {
            if ($this->type == 'debet') {
                $this->kredit = null;
            } else if ($this->type == 'kredit') {
                $this->debet = null;
            }
            \App\Models\Keuangan::find($id)->update([
                'debet' => $this->debet,
                'kredit' => $this->kredit,
                'keterangan' => $this->keterangan,
                'diarsipkan' => 'false',
                'created_at' => $this->dibuat,
            ]);
            session()->flash('success','Data keuangan Berhasil Diupdate!');
            $this->resetFields();
            $this->update = false;
            $this->mount();
            $this->dispatch('keuangan_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function delete($id) {
        try {
            \App\Models\Keuangan::find($id)->update(['diarsipkan' => 'true']);
            session()->flash('success','Data Berhasil Dihapus!');
            $this->resetFields();
            $this->mount();
            $this->dispatch('keuangan_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function render()
    {
        return view('livewire.admin-keuangan');
    }
}
