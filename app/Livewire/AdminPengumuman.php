<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminPengumuman extends Component
{
    public $pengumuman, $content, $display, $updateId, $preview;
    public $create, $update = false;
    public function mount() {
        $this->pengumuman = \App\Models\Pengumuman::where('diarsipkan', 'false')->get();
        $this->preview = \App\Models\Pengumuman::where('diarsipkan', 'false')->where('display' , 'true')->first();
    }
    public function refreshData() {
        $this->dispatch('pengumuman_updated')->to(Pengumuman::class);
        $this->pengumuman = \App\Models\Pengumuman::where('diarsipkan', 'false')->get();
        $this->preview = \App\Models\Pengumuman::where('diarsipkan', 'false')->where('display' , 'true')->first();
    }
    protected $rules = [
       'content' => 'required',
       'display' => 'required'
    ];
    public function resetFields() {
        $this->content = '';
        $this->display = '';
    }
    public function new() {
        $this->create = true;
        $this->update = false;
    }
    public function store() {
        $this->validate();
        try {
            if ($this->display == 'true') {
                \App\Models\Pengumuman::where('display', 'true')->update(['display' => 'false']);
            }
            $pc = \App\Models\Pengumuman::create([
                'content' => $this->content,
                'display' => $this->display,
                'diarsipkan' => 'false'
            ]);
            \App\Models\Log_History::create([
                'bagian' => 'Pengumuman ID '. $pc->id,
                'aktivitas' => 'Membuat',
                'oleh' => Auth::user()->name,
                'keterangan' => 'Content : '. $this->content .', Display : '. $this->display,
                'role' => Auth::user()->role
            ]);
            session()->flash('success','Pengumuman Berhasil Dibuat!');
            $this->resetFields();
            $this->create = false;
            $this->refreshData(); //Bisa juga lempar ke mount...
            $this->dispatch('pengumuman_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function edit($id) {
        $this->update = true;
        $this->create = false;
        $this->updateId = $id;
        $pengumuman = \App\Models\Pengumuman::find($id);
        $this->content = $pengumuman->content;
        $this->display = $pengumuman->display;
    }
    public function updates($id) {
        $this->validate();
        try {
            if ($this->display == 'true') {
                \App\Models\Pengumuman::where('display', 'true')->update(['display' => 'false']);
            }
            \App\Models\Pengumuman::find($id)->update([
                'content' => $this->content,
                'display' => $this->display,
            ]);
            \App\Models\Log_History::create([
                'bagian' => 'Pengumuman ID '. $id,
                'aktivitas' => 'Mengedit',
                'oleh' => Auth::user()->name,
                'keterangan' => 'Content : '. $this->content .', Display : '. $this->display,
                'role' => Auth::user()->role
            ]);
            session()->flash('success','Pengumuman Berhasil Diupdate!');
            $this->resetFields();
            $this->update = false;
            $this->refreshData();
            $this->dispatch('pengumuman_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function delete($id) {
        try {
            $pd = \App\Models\Pengumuman::find($id);
            \App\Models\Pengumuman::find($id)->update(['display' => 'false','diarsipkan' => 'true']);
            \App\Models\Log_History::create([
                'bagian' => 'Pengumuman ID '. $id,
                'aktivitas' => 'Menghapus',
                'oleh' => Auth::user()->name,
                'keterangan' => 'Content : '. $pd->content .', Display : '. $pd->display,
                'role' => Auth::user()->role
            ]);
            session()->flash('success','Pengumuman Berhasil Dihapus!');
            $this->resetFields();
            $this->refreshData();
            $this->dispatch('pengumuman_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function displays($id) {
        try {
            \App\Models\Pengumuman::where('display','true')->update(['display' => 'false']);
            \App\Models\Pengumuman::find($id)->update(['display' => 'true']);
            session()->flash('success','Pengumuman Berhasil Ditampilkan!');
            $this->resetFields();
            $this->refreshData();
            $this->dispatch('pengumuman_updated');
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
    }
    public function cancel() {
        $this->resetFields();
        $this->create = false;
        $this->update = false;
    }
    public function cancelEdit($id) {
        $this->resetFields();
        $this->create = false;
        $this->update = false;
        $this->updateId = null;
    }
    public function render() {
        return view('livewire.admin-pengumuman');
    }
}
