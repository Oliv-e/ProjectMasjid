<div>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="hidden max-w-7xl w-full md:flex justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()"><i class="me-4 bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2 ml-2"></i> Kembali</a>
            <a wire:click="new()">Buat Pengumuman Baru <i class="ms-4 bi bi-plus rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2 mr-2"></i></a>
        </div>
        <div class="md:hidden max-w-7xl w-[90%] flex justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()"><i class="me-2 bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2 ml-2"></i></a>
            <a wire:click="new()">Pengumuman Baru <i class="ms-2 bi bi-plus rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2 mr-2"></i></a>
        </div>
    </div>
{{-- Tab & Desktop --}}
    <div class="hidden md:flex py-4 flex-col w-full gap-2">
        <div class="max-w-7xl w-full mx-auto sm:px-6 md:px-8">
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
                    <div class="hidden md:block">
                        <table class="mx-auto table-auto border-collapse border border-slate-500">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border border-slate-600">No.</th>
                                    <th class="px-4 py-2 border border-slate-600">Isi Pengumuman</th>
                                    <th class="px-4 py-2 border border-slate-600">Ditampilkan</th>
                                    {{-- <th class="px-4 py-2 border border-slate-600">Dibuat</th>
                                    <th class="px-4 py-2 border border-slate-600">Diedit</th>
                                    <th class="px-4 py-2 border border-slate-600">Oleh</th> --}}
                                    <th class="px-4 py-2 border border-slate-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody wire:poll>
                                @if($create == true)
                                <form>
                                    <tr class="text-center">
                                        <td class="border border-slate-600">
                                            <span><i class="bi bi-plus text-xl p-4"></i></span>
                                        </td>
                                        <td class="border border-slate-600 px-2">
                                            <input type="text" wire:model="content" name="content" class="w-full rounded-md @error('content') is-invalid @enderror" placeholder="Masukkan Pengumuman">
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
                                        {{-- <td class="border border-slate-600"><span class="p-4"></span></td>
                                        <td class="border border-slate-600"><span class="p-4"></span></td>
                                        <td class="border border-slate-600"><span class="p-4">{{Auth::user()->name}}</span></td> --}}
                                        <td class="border border-slate-600 text-2xl mx-auto">
                                            <div class="p-4 flex gap-2 justify-center">
                                                <a wire:click.prevent="store()"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                                <a wire:click.prevent="cancel()"><i class="bi bi-x hover:text-red-500 hover:bg-red-200 bg-red-700 px-1 my-1 rounded-md text-white"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                                @endif
                                @foreach ($pengumuman as $item)
                                <tr class="text-center">
                                    <td class="border border-slate-600"><span class="p-4">{{$loop->iteration}}</span></td>
                                    <td class="border border-slate-600 px-2">
                                        @if($update && $item->id == $updateId)
                                        <input type="text" wire:model="content" name="content" class="w-full rounded-md @error('content') is-invalid @enderror" placeholder="Masukkan Pengumuman">
                                        @error('content')
                                            {{$message}}
                                        @enderror
                                        @else
                                        <span class="p-2">{{$item->content}}</span>
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
                                    {{-- <td class="border border-slate-600"><span class="p-4">{{$item->created_at}}</span></td>
                                    <td class="border border-slate-600"><span class="p-4">{{$item->updated_at}}</span></td>
                                    <td class="border border-slate-600"><span class="p-4">{{Auth::user()->name}}</span></td> --}}
                                    <td class="border border-slate-600 text-2xl mx-auto">
                                        <div class="p-4 flex gap-2 justify-center">
                                            @if($update && $item->id == $updateId)
                                                <a wire:click.prevent="updates({{$item->id}})"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                                <a wire:click.prevent="cancelEdit({{$item->id}})"><i class="bi bi-x hover:text-red-500 hover:bg-red-200 bg-red-700 px-1 my-1 rounded-md text-white"></i></a>
                                            @else
                                                <a wire:click.prevent="edit({{$item->id}})"><i class="bi bi-pen hover:text-amber-500"></i></a>
                                                <a onclick="confirmLiveDelete({{$item->id}})"><i class="mx-4 bi bi-trash hover:text-red-500"></i></a>
                                                <a wire:click.prevent="displays({{$item->id}})"><i class="bi bi-display-fill {{$item->display == 'true' ? 'text-green-500 hover:text-black' : 'text-black hover:text-green-500'}}"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- responsive --}}
    <div class="md:hidden py-4 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-[90%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden rounded-md shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="my-2">
                        <span>Preview Pengumuman</span>
                        <div wire:poll class="mt-2 p-2 border-2 border-slate-300 rounded-md">
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
                    <div class="w-full flex flex-col gap-2">
                        @if ($create == true)
                        <div class="card bg-slate-300 rounded-md">
                            <div class="flex flex-col gap-2 p-2 mt-1">
                                <div class=" w-full overflow-hidden transition-all">
                                    <input type="text" wire:model="content" name="content" class="w-full rounded-md @error('content') is-invalid @enderror" placeholder="Masukkan Pengumuman">
                                    @error('content')
                                    {{$message}}
                                    @enderror
                                </div>
                                <div class="flex flex-row gap-2 text-sm justify-between">
                                    <p class="my-1 flex">Ingin di Tampilkan?</p>
                                    <div class="flex flex-row gap-2">
                                        <div class="m-1 flex items-center">
                                            <input wire:model='display' name="display" type="radio" value="true">
                                            <span class="mx-2">Ya</span>
                                        </div>
                                        <div class="m-1 flex items-center">
                                            <input wire:model='display' name="display" type="radio" value="false">
                                            <label class="mx-2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row gap-2 py-2 text-2xl justify-end">
                                    <a wire:click.prevent="store()"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                    <a wire:click.prevent="cancel()"><i class="bi bi-x hover:text-red-500 hover:bg-red-200 bg-red-700 px-1 my-1 rounded-md text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @foreach ($pengumuman as $item)
                        <div class="card w-full">
                            <div class="bg-slate-200 rounded-md flex items-center gap-2 p-3">
                                <p class="">{{$loop->iteration}}</p>
                                <div class="min-h-10 flex items-center w-full mx-2">
                                    @if($update && $item->id == $updateId)
                                        <input type="text" wire:model="content" name="content" class="rounded-md w-full" placeholder="Masukkan Pengumuman">
                                        @error('content')
                                            {{$message}}
                                        @enderror
                                        @else
                                        <span>{{$item->content}}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="flex mt-3 items-center gap-x-4 text-2xl justify-end">
                                    @if($update && $item->id == $updateId)
                                        <a wire:click.prevent="updates({{$item->id}})"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                        <a wire:click.prevent="cancelEdit({{$item->id}})"><i class="bi bi-x hover:text-red-500"></i></a>
                                    @else
                                        <a wire:click.prevent="edit({{$item->id}})"><i class="bi bi-pen hover:text-amber-500"></i></a>
                                        <a onclick="confirmLiveDelete({{$item->id}})"><i class="mx-4 bi bi-trash hover:text-red-500"></i></a>
                                        <a wire:click.prevent="displays({{$item->id}})"><i class="bi bi-display-fill {{$item->display == 'true' ? 'text-green-500 hover:text-black' : 'text-black hover:text-green-500'}}"></i></a>
                                    @endif
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        confirmLiveDelete = function(item_id) {
            swal({
                'title': 'Konfirmasi Hapus',
                'text': 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                'dangerMode': true,
                'buttons': true
            }).then(function(value) {
                if (value) {
                    @this.delete(item_id);
                }
            })
        }
    </script>
</div>
