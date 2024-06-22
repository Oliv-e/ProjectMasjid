<div>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full flex justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
            <a wire:click="new()">Tambah Data Keuangan <i class="bi bi-plus rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i></a>
        </div>
    </div>
    
    <div class="flex flex-col w-full gap-2">
        <div class="max-w-8xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session()->has('success'))
                        <div>
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div>
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div>
                        <table class="mx-auto table-auto border-collapse border border-slate-500">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border border-slate-600">No.</th>
                                    <th class="px-4 py-2 border border-slate-600">Tgl</th>
                                    <th class="px-4 py-2 border border-slate-600">Jenis</th>
                                    <th class="px-4 py-2 border border-slate-600">Debet</th>
                                    <th class="px-4 py-2 border border-slate-600">Kredit</th>
                                    <th class="px-4 py-2 border border-slate-600">Saldo</th>
                                    <th class="px-4 py-2 border border-slate-600">Keterangan</th>
                                    <th class="px-4 py-2 border border-slate-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody wire:poll>
                                @foreach ($data_keuangan as $index => $item)
                                <tr class="text-center">
                                    <td class="border border-slate-600"><span class="p-4">{{$item->id}}</span></td>
                                    <td class="border border-slate-600">
                                        @if($update && $item->id == $updateId)
                                        <input type="date" wire:model="dibuat" name="dibuat" class="rounded-md @error('dibuat') is-invalid @enderror">
                                        @error('dibuat')
                                        {{$message}}
                                        @enderror
                                        @else
                                        <span class="p-4">{{$item->created_at}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600">
                                        @if($update && $item->id == $updateId)
                                            <label>
                                                <input type="radio" wire:model="type" value="debet" />
                                                Debet
                                            </label>
                                            <label>
                                                <input type="radio" wire:model="type" value="kredit" />
                                                Kredit
                                            </label>
                                        @else
                                        <span class="p-4">
                                            @isset ($item->debet)
                                                Pemasukan
                                            @else
                                                Pengeluaran
                                            @endif
                                        </span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600">
                                        @if($update && $item->id == $updateId)
                                            @if($type == 'debet')
                                                <input type="number" wire:model="debet" name="debet" class="rounded-md @error('debet') is-invalid @enderror" placeholder="Masukkan Debet">
                                                @error('debet')
                                                {{$message}}
                                                @enderror
                                            @endif
                                        @else
                                        <span class="p-4">{{$item->debet}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600">
                                        @if($update && $item->id == $updateId)
                                            @if($type == 'kredit')
                                                <input type="number" wire:model="kredit" name="kredit" class="rounded-md @error('kredit') is-invalid @enderror" placeholder="Masukkan Kredit">
                                                @error('kredit')
                                                {{$message}}
                                                @enderror
                                            @endif
                                        @else
                                        <span class="p-4">{{$item->kredit}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600">
                                        <span class="p-4">{{$data_saldo[$index]}}</span>
                                    </td>
                                    <td class="border border-slate-600">
                                        @if($update && $item->id == $updateId)
                                            <input type="text" wire:model="keterangan" name="keterangan" class="rounded-md @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan">
                                            @error('keterangan')
                                            {{$message}}
                                            @enderror
                                        @else
                                        <span class="p-4">{{$item->keterangan}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600 text-2xl mx-auto">
                                        <div class="p-4">
                                            @if($update && $item->id == $updateId)
                                                <a wire:click.prevent="updates({{$item->id}})"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                                <a wire:click.prevent="cancelEdit({{$item->id}})"><i class="bi bi-x hover:text-red-500"></i></a>
                                            @else
                                                <a wire:click.prevent="edit({{$item->id}})"><i class="bi bi-pen hover:text-amber-500"></i></a>
                                                <a wire:click.prevent="delete({{$item->id}})"><i class="mx-4 bi bi-trash hover:text-red-500"></i></a>
                                                {{-- <a wire:click.prevent="displays({{$item->id}})"><i class="bi bi-display-fill {{$item->display == 'true' ? 'text-green-500 hover:text-black' : 'text-black hover:text-green-500'}}"></i></a> --}}
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @if($create == true)
                                <form>
                                    <tr class="text-center">
                                        <td class="border border-slate-600">
                                            <span><i class="bi bi-plus text-xl"></i></span>
                                        </td>
                                        <td class="border border-slate-600">
                                            <input type="date" wire:model="dibuat" name="dibuat" class="rounded-md @error('dibuat') is-invalid @enderror">
                                            @error('dibuat')
                                            {{$message}}
                                            @enderror
                                        </td>
                                        <td class="border border-slate-600">
                                            <label>
                                                <input type="radio" wire:model="type" value="debet" />
                                                Debet
                                            </label>
                                            <label>
                                                <input type="radio" wire:model="type" value="kredit" />
                                                Kredit
                                            </label>
                                        </td>
                                        <td class="border border-slate-600">
                                            @if($type == 'debet')
                                                <input type="number" wire:model="debet" name="debet" class="rounded-md @error('debet') is-invalid @enderror" placeholder="Masukkan Debet">
                                                @error('debet')
                                                {{$message}}
                                                @enderror
                                            @endif
                                        </td>
                                        <td class="border border-slate-600">
                                            @if($type == 'kredit')
                                                <input type="number" wire:model="kredit" name="kredit" class="rounded-md @error('kredit') is-invalid @enderror" placeholder="Masukkan Kredit">
                                                @error('kredit')
                                                {{$message}}
                                                @enderror
                                            @endif
                                        </td>
                                        <td class="border border-slate-600">
                                        </td>
                                        <td class="border border-slate-600">
                                            <input type="text" wire:model="keterangan" name="keterangan" class="rounded-md @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan">
                                            @error('keterangan')
                                            {{$message}}
                                            @enderror
                                        </td>
                                        <td class="border border-slate-600 text-2xl mx-auto">
                                            <div class="p-4">
                                                <a wire:click.prevent="store()"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                                <a wire:click.prevent="cancel()"><i class="bi bi-x hover:text-red-500"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>