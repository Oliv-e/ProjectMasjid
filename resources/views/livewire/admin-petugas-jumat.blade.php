<div>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="flex max-w-7xl w-[90%] md:w-full items-center justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()" class="p-2 px-3 text-white rounded-lg bg-gray-800"><i class="bi bi-arrow-left hover:text-blue-500 text-white"></i></a>
            <div class="flex gap-2 items-center">
                @if($update && $data_petugas_jumat->id == $updateId)
                    <a class="p-2 px-3 text-white rounded-lg bg-gray-800" wire:click.prevent="updates({{$data_petugas_jumat->id}})"><i class="bi bi-floppy hover:text-green-500"></i></a>
                    <a class="p-2 px-3 text-white rounded-lg bg-gray-800" wire:click.prevent="cancelEdit({{$data_petugas_jumat->id}})"><i class="bi bi-x hover:text-red-500"></i></a>
                @else
                    <a class="p-2 px-3 text-white rounded-lg bg-gray-800" wire:click.prevent="edit({{$data_petugas_jumat->id}})"><i class="bi bi-pen hover:text-amber-500"></i></a>
                    <a class="p-2 px-3 text-white rounded-lg bg-gray-800" wire:click.prevent="bersihkan({{$data_petugas_jumat->id}})"><i class="bi bi-trash hover:text-red-500"></i></a>
                @endif
            </div>
        </div>
    </div>
    
    <div class="py-4 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session()->has('success'))
                        <div class="pb-6 text-center">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="pb-6 text-center">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <div>
                        <div class="flex">
                            <div class="flex flex-col md:text-2xl gap-4 mx-auto">
                                @if($update && $data_petugas_jumat->id == $updateId)
                                    <div class="flex items-center justify-between p-2 bg-slate-900 rounded-md gap-2">
                                        <span class="text-white font-mono">Khotib : </span>
                                        <input type="text" wire:model="khotib" name="khotib" class="rounded-md border-slate-900 @error('khotib') is-invalid @enderror" placeholder="Masukkan Nama">
                                        @error('khotib')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    @else
                                    <div class="text-white font-mono bg-slate-900 rounded flex justify-between items-center p-2">
                                        <span class="me-4">Khotib : </span>
                                        <span class="bg-white p-1 font-mono px-2 rounded-md text-gray-800">{{$data_petugas_jumat->khotib}}</span>
                                    </div>
                                @endif
                                @if($update && $data_petugas_jumat->id == $updateId)
                                    <div class="flex items-center justify-between p-2 bg-slate-900 rounded-md gap-2">
                                        <span class="text-white font-mono">Imam : </span>
                                        <input type="text" wire:model="imam" name="imam" class="rounded-md border-slate-900 @error('imam') is-invalid @enderror" placeholder="Masukkan Nama">
                                        @error('imam')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    @else
                                    <div class="text-white font-mono bg-slate-900 rounded flex justify-between items-center p-2">
                                        <span class="me-4">Imam : </span>
                                        <span class="bg-white p-1 font-mono px-2 rounded-md text-gray-800">{{$data_petugas_jumat->imam}}</span>
                                    </div>
                                @endif
                                @if($update && $data_petugas_jumat->id == $updateId)
                                    <div class="flex items-center justify-between p-2 bg-slate-900 rounded-md gap-2">
                                        <span class="text-white font-mono">Muadzin : </span>
                                        <input type="text" wire:model="muadzin" name="muadzin" class="rounded-md border-slate-900 @error('muadzin') is-invalid @enderror" placeholder="Masukkan Nama">
                                        @error('muadzin')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    @else
                                    <div class="text-white font-mono bg-slate-900 rounded flex justify-between items-center p-2">
                                        <span class="me-4">Muadzin : </span>
                                        <span class="bg-white p-1 font-mono px-2 rounded-md text-gray-800">{{$data_petugas_jumat->muadzin}}</span>
                                    </div>
                                @endif
                                @if($update && $data_petugas_jumat->id == $updateId)
                                    <div class="flex items-center justify-between p-2 bg-slate-900 rounded-md gap-2">
                                        <span class="text-white font-mono">Bilal : </span>
                                        <input type="text" wire:model="bilal" name="bilal" class="rounded-md border-slate-900 @error('bilal') is-invalid @enderror" placeholder="Masukkan Nama">
                                        @error('bilal')
                                            {{$message}}
                                        @enderror
                                    </div>
                                    @else
                                    <div class="text-white font-mono bg-slate-900 rounded flex justify-between items-center p-2">
                                        <span class="me-4">Bilal : </span>
                                        <span class="bg-white p-1 font-mono px-2 rounded-md text-gray-800">{{$data_petugas_jumat->bilal}}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>