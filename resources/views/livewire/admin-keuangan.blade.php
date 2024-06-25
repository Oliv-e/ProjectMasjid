{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}


<div>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full flex justify-between mx-auto sm:px-6 lg:px-8 ">
            <a onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2 ml-2"></i> Kembali</a>
            <a wire:click="new()">Tambah Data Keuangan <i class="bi bi-plus rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2 mr-2"></i></a>
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
                    <h2 class="font-bold text-2xl">Keuangan</h2>
                    <div class="bg-blue-300 rounded-xl">
                        @foreach ($data_keuangan as $index => $item)
                        <div wire:poll class=" text-black transition-all">
                            <div class="flex items-center p-3 justify-between">
                                <p class="text-black">{{$loop->iteration}}</p>
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
                                        <span class="text-white bg-green-700 p-1 rounded-full">Pemasukan</span>
                                    @else
                                        <span class="text-white p-1 bg-red-700 rounded-full">Pengeluaran</span>
                                    @endif
                                </span>
                                @endif
                                <span class="p-4">Rp. {{$data_saldo[$index]}}</span>
                                <div class="flex flex-wrap items-center">
                                    @if($update && $item->id == $updateId)
                                        <a wire:click.prevent="updates({{$item->id}})"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                        <a wire:click.prevent="cancelEdit({{$item->id}})"><i class="bi bi-x hover:text-red-500"></i></a>
                                    @else
                                        <a wire:click.prevent="edit({{$item->id}})"><i class="bi bi-pen hover:text-amber-500"></i></a>
                                        <a wire:click.prevent="delete({{$item->id}})"><i class="mx-4 bi bi-trash hover:text-red-500"></i></a>
                                       
                                    @endif
                             </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="flex">
                                    <span class="px-4">Tanggal:</span>
                                    @if($update && $item->id == $updateId)
                                        <input type="date" wire:model="dibuat" name="dibuat" class="rounded-md @error('dibuat') is-invalid @enderror">
                                        @error('dibuat')
                                        {{$message}}
                                        @enderror
                                        @else
                                        <span class="px-2">{{$item->created_at}}</span>
                                        @endif
                                    
                                </div>
                                <div class="flex">
                                    <span class="px-4">Keterangan:</span>
                                    @if($update && $item->id == $updateId)
                                        <input type="text" wire:model="keterangan" name="keterangan" class="rounded-md @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan">
                                        @error('keterangan')
                                        {{$message}}
                                        @enderror
                                    @else
                                    <span class="px-2 pb-2">{{$item->keterangan}}</span>
                                    @endif
                                </div>
                                <div class="flex flex-col w-2/3 text-black">
                                    @if($update && $item->id == $updateId)
                                            @if($type == 'debet')
                                                <label class="text-white" for="">Debet : </label>
                                                <input type="number" wire:model="debet" name="debet" class="rounded-md text-black @error('debet') is-invalid @enderror" placeholder="Masukkan Debet">
                                                @error('debet')
                                                {{$message}}
                                                @enderror
                                            @endif
                                        @else
                                        <span class="px-4 text-white">Debet : Rp. {{$item->debet}}</span>
                                        @endif
                                        @if($update && $item->id == $updateId)
                                            @if($type == 'kredit')
                                            <label for="">Kredit :</label>
                                                <input type="number" wire:model="kredit" name="kredit" class="rounded-md  @error('kredit') is-invalid @enderror" placeholder="Masukkan Kredit">
                                                @error('kredit')
                                                {{$message}}
                                                @enderror
                                            @endif
                                        @else
                                        <span class="text-white px-4 pb-4"  >Kredit : Rp. {{$item->kredit}}</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        @endforeach
                        @if ($create == true)
                        <form action="">
                            <div wire:poll class=" text-black transition-all">
                                <div class="flex items-center p-3 justify-between">
                                    <p class="text-black"><i class="bi bi-plus"></i></p>
                                    
                                    <label>
                                        <input type="radio" wire:model="type" value="debet" />
                                        Debet
                                    </label>
                                    <label>
                                        <input type="radio" wire:model="type" value="kredit" />
                                        Kredit
                                    </label>
                                    
                                    <div class="flex flex-wrap items-center">
                                        <a wire:click.prevent="store()"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                        <a wire:click.prevent="cancel()"><i class="bi bi-x hover:text-red-500"></i></a>
                                   
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="flex">
                                        <span class="px-4">Tanggal:</span>
                                        <input type="date" wire:model="dibuat" name="dibuat" class="rounded-md @error('dibuat') is-invalid @enderror">
                                                @error('dibuat')
                                                {{$message}}
                                                @enderror
                                        
                                    </div>
                                    <div class="flex">
                                        <span class="px-4">Keterangan:</span>
                                        <input type="text" wire:model="keterangan" name="keterangan" class="rounded-md @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan">
                                        @error('keterangan')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="flex flex-col w-2/3 text-black">
                                        @if($type == 'debet')
                                                    <input type="number" wire:model="debet" name="debet" class="rounded-md @error('debet') is-invalid @enderror" placeholder="Masukkan Debet">
                                                    @error('debet')
                                                    {{$message}}
                                                    @enderror
                                                @endif
                                                @if($type == 'kredit')
                                                <input type="number" wire:model="kredit" name="kredit" class="rounded-md @error('kredit') is-invalid @enderror" placeholder="Masukkan Kredit">
                                                @error('kredit')
                                                {{$message}}
                                                @enderror
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endif
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>