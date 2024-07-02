<div wire:poll>
    <div class="pt-12 pb-6 flex flex-col w-full gap-2">
        <div class="md:flex max-w-7xl w-full hidden justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()"><i class="me-4 bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
            <a wire:click="new()">Tambah Data Keuangan <i class="ms-4 bi bi-plus rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i></a>
        </div>
        <div class="md:hidden max-w-7xl w-[90%] flex justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()"><i class="me-2 bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2 ml-2"></i></a>
            <a wire:click="new()">Data Baru <i class="ms-2 bi bi-plus rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2 mr-2"></i></a>
        </div>
    </div>
    <div class="pb-4 flex flex-row justify-between w-[50%] gap-2">
        <div class="md:flex max-w-7xl w-full hidden gap-2 mx-auto sm:px-6 lg:px-8">
            <select wire:model="month" wire:change="search" class="rounded-md">
                <option hidden selected>{{now()->format('m')}}</option>
                @foreach(range(1, 12) as $month)
                    <option value="{{ $month }}">{{ $month }}</option>
                @endforeach
            </select>
            <select wire:model="year" wire:change="search" class="rounded-md">
                @foreach(range(date('Y'), 2020) as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
            <div class="rounded-md border border-slate-500 p-2 bg-white">
                <button wire:click.prevent='disp()'><i class="bi bi-display-fill @if($this->visible == 'true') text-green-500 @else text-red-500 @endif text-2xl"></i></button>
            </div>
        </div>
    </div>
    
    <div class="flex flex-col w-full gap-2">
        <div class="max-w-8xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="hidden lg:block bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                        <table class="mt-2 mx-auto table-auto border-collapse border border-slate-500">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border border-slate-600">No.</th>
                                    <th class="px-4 py-2 border border-slate-600">Hari / Tanggal</th>
                                    <th class="px-4 py-2 border border-slate-600">Jenis</th>
                                    <th class="px-4 py-2 border border-slate-600">Pemasukan</th>
                                    <th class="px-4 py-2 border border-slate-600">Pengeluaran</th>
                                    <th class="px-4 py-2 border border-slate-600">Saldo</th>
                                    <th class="px-4 py-2 border border-slate-600">Keterangan</th>
                                    <th class="px-4 py-2 border border-slate-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($create == true)
                                <form>
                                    <tr class="text-center">
                                        <td class="border border-slate-600">
                                            <span><i class="bi bi-plus text-xl"></i></span>
                                        </td>
                                        <td class="border border-slate-600 px-2">
                                            <input type="datetime-local" wire:model="dibuat" name="dibuat" class="rounded-md @error('dibuat') is-invalid @enderror">
                                            @error('dibuat')
                                            {{$message}}
                                            @enderror
                                        </td>
                                        <td class="border border-slate-600 px-2">
                                            <label>
                                                <input type="radio" wire:model="type" value="debet" />
                                                Pemasukan
                                            </label>
                                            <label>
                                                <input type="radio" wire:model="type" value="kredit" />
                                                Pengeluaran
                                            </label>
                                        </td>
                                        <td class="border border-slate-600 px-2">
                                            @if($type == 'debet')
                                                <input type="number" wire:model="debet" name="debet" class="rounded-md @error('debet') is-invalid @enderror" placeholder="Jumlah Masuk (Rp)">
                                                @error('debet')
                                                {{$message}}
                                                @enderror
                                            @endif
                                        </td>
                                        <td class="border border-slate-600 px-2">
                                            @if($type == 'kredit')
                                                <input type="number" wire:model="kredit" name="kredit" class="rounded-md @error('kredit') is-invalid @enderror" placeholder="Jumlah Keluar (Rp)">
                                                @error('kredit')
                                                {{$message}}
                                                @enderror
                                            @endif
                                        </td>
                                        <td class="border border-slate-600">
                                        </td>
                                        <td class="border border-slate-600 px-2">
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
                                @foreach ($data_keuangan as $index => $item)
                                <tr class="text-center">
                                    <td class="border border-slate-600"><span class="p-4">{{$loop->iteration}}</span></td>
                                    <td class="border border-slate-600 px-2">
                                        @if($update && $item->id == $updateId)
                                        <input type="datetime-local" wire:model="dibuat" name="dibuat" class="rounded-md @error('dibuat') is-invalid @enderror">
                                        @error('dibuat')
                                        {{$message}}
                                        @enderror
                                        @else
                                        <?php
                                        switch ($weekday = $item->created_at->format('l')) {
                                            case 'Monday':
                                                $weekday = 'Senin';
                                                break;
                                            case 'Tuesday':
                                                $weekday = 'Selasa';
                                                break;
                                            case 'Wednesday':
                                                $weekday = 'Rabu';
                                                break;
                                            case 'Thursday':
                                                $weekday = 'Kamis';
                                                break;
                                            case 'Friday':
                                                $weekday = 'Jumat';
                                                break;
                                            case 'Saturday':
                                                $weekday = 'Sabtu';
                                                break;
                                            case 'Sunday':
                                                $weekday = 'Minggu';
                                                break;
                                        };
                                        ?>
                                        <span class="p-4">{{$weekday}}, {{ $item->created_at->format('d-m-Y') }}</span>
                                        @endif
                                    </td>
                                    <td class="border border-slate-600 px-2">
                                        @if($update && $item->id == $updateId)
                                            <label>
                                                <input type="radio" wire:model="type" value="debet" />
                                                Pemasukan
                                            </label>
                                            <label>
                                                <input type="radio" wire:model="type" value="kredit" />
                                                Pengeluaran
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
                                    <td class="border border-slate-600 px-2">
                                        @if($update && $item->id == $updateId)
                                            @if($type == 'debet')
                                                <input type="number" wire:model="debet" name="debet" class="rounded-md @error('debet') is-invalid @enderror" placeholder="Jumlah Masuk (Rp)">
                                                @error('debet')
                                                    {{$message}}
                                                @enderror
                                            @endif
                                        @else
                                            @if($item->debet)
                                                <span class="p-4">Rp. {{number_format($item->debet,0,',','.')}}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border border-slate-600 px-2">
                                        @if($update && $item->id == $updateId)
                                            @if($type == 'kredit')
                                                <input type="number" wire:model="kredit" name="kredit" class="rounded-md @error('kredit') is-invalid @enderror" placeholder="Jumlah Keluar (Rp)">
                                                @error('kredit')
                                                {{$message}}
                                                @enderror
                                            @endif
                                        @else
                                        @if($item->kredit)
                                                <span class="p-4">Rp. {{number_format($item->kredit,0,',','.')}}</span>
                                            @endif
                                        @endif
                                    </td>
                                    <td class="border border-slate-600">
                                        <span class="p-4">Rp. {{number_format($data_saldo[$index],0,',','.')}}</span>
                                    </td>
                                    <td class="border border-slate-600 px-2">
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
                                                <a onclick="confirmLiveDelete({{$item->id}})"><i class="mx-4 bi bi-trash hover:text-red-500"></i></a>
                                                {{-- <a wire:click.prevent="displays({{$item->id}})"><i class="bi bi-display-fill {{$item->display == 'true' ? 'text-green-500 hover:text-black' : 'text-black hover:text-green-500'}}"></i></a> --}}
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

    <div class="block lg:hidden py-4 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-[90%] mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden rounded-md shadow-sm sm:rounded-lg">
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
                    <div class="w-full flex flex-col gap-2">
                        @if ($create == true)
                        <div class="card bg-slate-200 rounded-md">
                            <div class="flex flex-col gap-2 p-2 mt-1">
                                <div class=" w-full overflow-hidden transition-all">
                                    <p class="my-1">Hari / Tanggal</p>
                                    <input type="datetime-local" wire:model="dibuat" name="dibuat" class="rounded-md w-full">
                                </div>
                                <div class="flex flex-row gap-1 text-sm justify-between">
                                    <p class="my-1 flex">Jenis</p>
                                    <div class="flex flex-row">
                                        <div class="m-1 flex items-center">
                                            <input wire:model="type" type="radio" value="debet">
                                            <span class="mx-2">Pemasukan</span>
                                        </div>
                                        <div class="m-1 flex items-center">
                                            <input wire:model="type" type="radio" value="kredit">
                                            <label class="mx-2">Pengeluaran</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-row gap-2 text-sm justify-between">
                                @if($type == 'debet')
                                    <input type="number" wire:model="debet" name="debet" class="w-full rounded-md" placeholder="Jumlah Masuk (Rp)">
                                @elseif ($type == 'kredit')
                                    <input type="number" wire:model="kredit" name="kredit" class="w-full rounded-md" placeholder="Jumlah Keluar (Rp)">
                                @endif
                                </div>
                                <div class=" w-full overflow-hidden transition-all">
                                    <p class="my-1">Keterangan</p>
                                    <input type="text" wire:model="keterangan" class="rounded-md w-full" placeholder="Masukkan Keterangan">
                                </div>
                                <div class="flex flex-row gap-2 py-2 text-2xl justify-end">
                                    <a wire:click.prevent="store()"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                    <a wire:click.prevent="cancel()"><i class="bi bi-x hover:text-red-500 hover:bg-red-200 bg-red-700 px-1 my-1 rounded-md text-white"></i></a>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="flex gap-2">
                            <select wire:model="month" wire:change="search" class="rounded-md">
                                <option hidden selected>{{now()->format('m')}}</option>
                                @foreach(range(1, 12) as $month)
                                    <option value="{{ $month }}">{{ $month }}</option>
                                @endforeach
                            </select>
                            <select wire:model="year" wire:change="search" class="rounded-md">
                                @foreach(range(date('Y'), 2020) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            <div class="rounded-md border border-slate-500 p-2 bg-white">
                                <button wire:click.prevent='disp()'><i class="bi bi-display-fill @if($this->visible == 'true') text-green-500 @else text-red-500 @endif text-2xl"></i></button>
                            </div>
                        </div>
                        @foreach ($data_keuangan as $index => $item)
                        <div class="card w-full">
                            <div class="bg-slate-200 rounded-md flex flex-col gap-2 p-3">
                                <div class="flex items-center">
                                    <p>{{$loop->iteration}}</p>
                                    <div class="min-h-5 flex items-center w-full mx-2">
                                        @if($update && $item->id == $updateId)
                                            <input type="datetime-local" wire:model="dibuat" name="dibuat" class="rounded-md w-full">
                                            @error('dibuat')
                                                {{$message}}
                                            @enderror
                                        @else
                                            <?php
                                            switch ($weekday = $item->created_at->format('l')) {
                                                case 'Monday':
                                                    $weekday = 'Senin';
                                                    break;
                                                case 'Tuesday':
                                                    $weekday = 'Selasa';
                                                    break;
                                                case 'Wednesday':
                                                    $weekday = 'Rabu';
                                                    break;
                                                case 'Thursday':
                                                    $weekday = 'Kamis';
                                                    break;
                                                case 'Friday':
                                                    $weekday = 'Jumat';
                                                    break;
                                                case 'Saturday':
                                                    $weekday = 'Sabtu';
                                                    break;
                                                case 'Sunday':
                                                    $weekday = 'Minggu';
                                                    break;
                                            };
                                            ?>
                                            <span>{{$weekday}}, {{ $item->created_at->format('d-m-Y') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="flex items-center px-4 gap-2">
                                    @if($update && $item->id == $updateId)
                                        <label class="flex gap-2 items-center">
                                            <input type="radio" wire:model="type" value="debet" />
                                            Pemasukan
                                        </label>
                                        <label class="flex gap-2 items-center">
                                            <input type="radio" wire:model="type" value="kredit" />
                                            Pengeluaran
                                        </label>
                                    @else
                                        <span>
                                            @isset ($item->debet)
                                                Jenis : Pemasukan
                                            @else
                                                Jenis : Pengeluaran
                                            @endif
                                        </span>
                                    @endif
                                </div>
                                <div class="flex flex-col w-full">
                                    <div class="px-4 my-2">
                                        <span>Jumlah : </span>
                                    </div>
                                    <div class="flex items-center w-full px-4">
                                        @if($update && $item->id == $updateId)
                                            @if($type == 'debet')
                                                <input type="number" wire:model="debet" name="debet" class="w-full rounded-md" placeholder="Jumlah Masuk (Rp)">
                                                @error('debet')
                                                    {{$message}}
                                                @enderror
                                            @endif
                                        @else
                                            @if($item->debet)
                                                <span>Rp. {{number_format($item->debet,0,',','.')}}</span>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="flex items-center w-full px-4">
                                        @if($update && $item->id == $updateId)
                                            @if($type == 'kredit')
                                                <input type="number" wire:model="kredit" name="kredit" class="w-full rounded-md" placeholder="Jumlah Keluar (Rp)">
                                                @error('kredit')
                                                    {{$message}}
                                                @enderror
                                            @endif
                                        @else
                                            @if($item->kredit)
                                                <span>Rp. {{number_format($item->kredit,0,',','.')}}</span>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="px-4 my-2">
                                        <span>Sisa Saldo : </span>
                                    </div>
                                    <div class="px-4">
                                        <span>Rp. {{number_format($data_saldo[$index],0,',','.')}}</span>
                                    </div>
                                    <div class="px-4 my-2">
                                        <span>Keterangan : </span>
                                    </div>
                                    <div class="px-4 w-full">
                                        @if($update && $item->id == $updateId)
                                            <input type="text" wire:model="keterangan" name="keterangan" class="w-full rounded-md @error('keterangan') is-invalid @enderror" placeholder="Masukkan Keterangan">
                                            @error('keterangan')
                                            {{$message}}
                                            @enderror
                                        @else
                                        <span>{{$item->keterangan}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="flex mt-3 items-center gap-x-4 text-2xl justify-end">
                                    @if($update && $item->id == $updateId)
                                        <a wire:click.prevent="updates({{$item->id}})"><i class="bi bi-floppy hover:text-green-500"></i></a>
                                        <a wire:click.prevent="cancelEdit({{$item->id}})"><i class="bi bg-red-300 rounded-full px-2 py-1 bi-x hover:text-red-500"></i></a>
                                    @else
                                        <a wire:click.prevent="edit({{$item->id}})"><i class="bi bi-pen hover:text-amber-500"></i></a>
                                        <a onclick="confirmLiveDelete({{$item->id}})"><i class="mx-4 bi bi-trash hover:text-red-500"></i></a>
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