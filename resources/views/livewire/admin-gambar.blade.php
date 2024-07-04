<div wire.poll>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-[90%] md:w-full flex justify-between mx-auto sm:px-6 lg:px-8">
            <a class="mx-2" onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
        </div>
    </div>
    <div class="py-4 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="p-2 bg-slate-300 mb-2 rounded-md">
                        Maksimal Hanya Menampilkan 3 Latar Belakang, Perubahan Otomatis dilakukan dalam 5 Menit. Jika Gambar Kosong / Tidak Tampil Silahkan Menambahkan Gambar Melalui Fitur Edit. Silahkan Upload / Unggah Gambar yang landscape (Persegi Panjang 16:9) agar hasil menjadi lebih maksimal.
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
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach ($data_gambar as $item)
                            <div wire:poll>
                                <div>
                                    <img src="{{asset('storage/'.$item->gambar)}}" class="rounded-xl" alt="{{$item->gambar}}">
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="p-4">Sedang ditampilkan : {{$item->display == 'true' ? 'Ya' : 'Tidak'}}</span>
                                    <div class="flex">
                                        <a class="p-2 bg-gray-800 rounded text-white mx-1" href="{{route('gambar.editDisplay', $item->id)}}"><i class="bi bi-display-fill  {{$item->display == 'true' ? 'text-green-500 hover:text-black' : 'text-white hover:text-green-500'}}"></i></a>    
                                        <a class="p-2 bg-gray-800 rounded text-white mx-1" href="{{route('gambar.edit', $item->id)}}"><i class="bi bi-pen hover:text-amber-500"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>