<div>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full flex justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
            <a wire:click="new()">Buat Pengumuman Baru <i class="bi bi-plus rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i></a
        </div>
    </div>
    
    <div class="py-4 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="my-2">
                        <span>Preview Pengumuman</span>
                        <div wire:poll class="mt-2 p-4 bg-slate-300 rounded">
                            @isset($preview)
                                <span>{{$preview->content}}</span>
                            @else
                                <span>Tidak ada Pengumuman Terbaru!</span>
                            @endisset   
                        </div>
                    </div>
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
                                    <th class="px-4 py-2 border border-slate-600">Isi Pengumuman</th>
                                    <th class="px-4 py-2 border border-slate-600">Ditampilkan</th>
                                    <th class="px-4 py-2 border border-slate-600">Dibuat</th>
                                    <th class="px-4 py-2 border border-slate-600">Diedit</th>
                                    <th class="px-4 py-2 border border-slate-600">Oleh</th>
                                    <th class="px-4 py-2 border border-slate-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody wire:poll>
                                @foreach ($pengumuman as $item)
                                <tr class="text-center">
                                    <td class="border border-slate-600"><span class="p-4">{{$item->id}}</span></td>
                                    <td class="border border-slate-600">
                                        @if($update && $item->id == $updateId)
                                        <input type="text" wire:model="content" name="content" class="rounded-md @error('content') is-invalid @enderror" placeholder="Masukkan Pengumuman">
                                        @error('content')
                                            {{$message}}
                                        @enderror
                                        @else
                                        <span class="p-4">{{$item->content}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600">
                                        @if($update && $item->id == $updateId)
                                        <select name="display" wire:model="display" class="rounded-md">
                                            <option value="true">Ya</option>
                                            <option value="false">Tidak</option>
                                        </select>
                                        @else
                                        <span class="p-4">{{$item->display == 'true' ? 'Ya' : 'Tidak'}}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600"><span class="p-4">{{$item->created_at}}</span></td>
                                    <td class="border border-slate-600"><span class="p-4">{{$item->updated_at}}</span></td>
                                    <td class="border border-slate-600"><span class="p-4">{{Auth::user()->name}}</span></td>
                                    <td class="border border-slate-600 text-2xl mx-auto">
                                        <div class="p-4">
                                            @if($update && $item->id == $updateId)
                                                <a wire:click.prevent="updates({{$item->id}})"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                                <a wire:click.prevent="cancelEdit({{$item->id}})"><i class="bi bi-x hover:text-red-500"></i></a>
                                            @else
                                                <a wire:click.prevent="edit({{$item->id}})"><i class="bi bi-pen hover:text-amber-500"></i></a>
                                                <a wire:click.prevent="delete({{$item->id}})"><i class="mx-4 bi bi-trash hover:text-red-500"></i></a>
                                                <a wire:click.prevent="displays({{$item->id}})"><i class="bi bi-display-fill {{$item->display == 'true' ? 'text-green-500 hover:text-black' : 'text-black hover:text-green-500'}}"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @if($create == true)
                                <form>
                                    <tr class="text-center">
                                        <td class="border border-slate-600">
                                            <span><i class="bi bi-plus text-xl p-4"></i></span>
                                        </td>
                                        <td class="border border-slate-600">
                                            <input type="text" wire:model="content" name="content" class="rounded-md @error('content') is-invalid @enderror" placeholder="Masukkan Pengumuman">
                                            @error('content')
                                            {{$message}}
                                            @enderror
                                        </td>
                                        <td class="border border-slate-600">
                                            <select name="display" wire:model="display" class="rounded-md">
                                                <option value="" hidden></option>
                                                <option value="true">Ya</option>
                                                <option value="false">Tidak</option>
                                            </select>
                                        </td>
                                        <td class="border border-slate-600"><span class="p-4"></span></td>
                                        <td class="border border-slate-600"><span class="p-4"></span></td>
                                        <td class="border border-slate-600"><span class="p-4">{{Auth::user()->name}}</span></td>
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