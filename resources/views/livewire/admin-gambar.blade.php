<div wire.poll>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full flex justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
        </div>
    </div>
    <div class="py-4 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-2 bg-slate-300 mb-2 rounded-md">
                        Maksimal Hanya Menampilkan 3 Latar Belakang
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
                                    <th class="px-4 py-2 border border-slate-600">Gambar</th>
                                    <th class="px-4 py-2 border border-slate-600">Ditampilkan</th>
                                    <th class="px-4 py-2 border border-slate-600">Aksi</th>
                                </tr>
                            </thead>
                            <tbody wire:poll>
                                @foreach ($data_gambar as $item)
                                <tr class="text-center">
                                    <td class="border border-slate-600"><span class="p-4">{{$item->id}}</span></td>
                                    <td class="border border-slate-600">
                                        <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{$item->gambar}}" width="480px">
                                    </td>
                                    <td class="border border-slate-600">
                                        <span class="p-4">{{$item->display == 'true' ? 'Ya' : 'Tidak'}}</span>
                                    </td>
                                    <td class="border border-slate-600 text-2xl mx-auto">
                                        <div class="p-4">
                                            <a href="{{route('gambar.edit', $item->id)}}"><i class="bi bi-pen hover:text-amber-500"></i></a>
                                            <a href=""><i class="mx-4 bi bi-trash hover:text-red-500"></i></a>
                                            <a href="displays({{$item->id}})"><i class="bi bi-display-fill {{$item->display == 'true' ? 'text-green-500 hover:text-black' : 'text-black hover:text-green-500'}}"></i></a>
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
</div>