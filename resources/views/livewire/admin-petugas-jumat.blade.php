<div>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full flex justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
        </div>
    </div>
    
    <div class="py-4 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- <div class="my-2">
                        <span>Preview Petugas Jumat</span>
                        <div wire:poll class="mt-2 p-4 bg-slate-300 rounded">
                             123
                        </div>
                    </div> --}}
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
                                <tr class="text-2xl">
                                    <th class="px-4 py-2 border border-slate-600">Khotib</th>
                                    <th class="px-4 py-2 border border-slate-600">Imam</th>
                                    <th class="px-4 py-2 border border-slate-600">Muadzin</th>
                                    <th class="px-4 py-2 border border-slate-600">Bilal</th>
                                    <th class="px-4 py-2 border border-slate-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center text-2xl">
                                    <td class="border border-slate-600">
                                        @if($update && $data_petugas_jumat->id == $updateId)
                                            <input type="text" wire:model="khotib" name="khotib" class="rounded-md @error('khotib') is-invalid @enderror" placeholder="Masukkan Nama">
                                            @error('khotib')
                                                {{$message}}
                                            @enderror
                                            @else
                                            <span class="p-4">{{$data_petugas_jumat->khotib}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600">
                                        @if($update && $data_petugas_jumat->id == $updateId)
                                            <input type="text" wire:model="imam" name="imam" class="rounded-md @error('imam') is-invalid @enderror" placeholder="Masukkan Nama">
                                            @error('imam')
                                                {{$message}}
                                            @enderror
                                            @else
                                            <span class="p-4">{{$data_petugas_jumat->imam}}</span>
                                        @endif
                                    </td>
                                    </td>
                                    <td class="border border-slate-600">
                                        @if($update && $data_petugas_jumat->id == $updateId)
                                            <input type="text" wire:model="muadzin" name="muadzin" class="rounded-md @error('muadzin') is-invalid @enderror" placeholder="Masukkan Nama">
                                            @error('muadzin')
                                                {{$message}}
                                            @enderror
                                            @else
                                            <span class="p-4">{{$data_petugas_jumat->muadzin}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600">
                                        @if($update && $data_petugas_jumat->id == $updateId)
                                            <input type="text" wire:model="bilal" name="bilal" class="rounded-md @error('bilal') is-invalid @enderror" placeholder="Masukkan Nama">
                                            @error('bilal')
                                                {{$message}}
                                            @enderror
                                            @else
                                            <span class="p-4">{{$data_petugas_jumat->bilal}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600">
                                        @if($update && $data_petugas_jumat->id == $updateId)
                                            <a wire:click.prevent="updates({{$data_petugas_jumat->id}})"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                            <a wire:click.prevent="cancelEdit({{$data_petugas_jumat->id}})"><i class="bi bi-x hover:text-red-500"></i></a>
                                        @else
                                            <a wire:click.prevent="edit({{$data_petugas_jumat->id}})"><i class="bi bi-pen hover:text-amber-500"></i></a>
                                            <a wire:click.prevent="bersihkan({{$data_petugas_jumat->id}})"><i class="bi bi-trash hover:text-red-500"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>