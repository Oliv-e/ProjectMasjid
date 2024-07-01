<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aktivitas Saya') }}
        </h2>
    </x-slot>
    <div class="py-4 flex flex-col w-full gap-2">
        <div class="md:max-w-7xl w-[90%] mx-auto sm:px-6 md:px-8">
            <div class="mb-4 flex flex-col md:flex-row gap-4 md:justify-between md:items-center">
                <a onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($data as $item)
                    <div class="rounded-md flex flex-col gap-2 bg-slate-700 text-white p-4">
                        <div class="flex justify-between">
                            <span>{{$loop->iteration}}</span>
                            <span>{{$item->bagian}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>{{$item->aktivitas}}</span>
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')<span>{{$item->oleh}}</span>@endif
                        </div>
                        <div class="flex flex-col justify-between">
                            <p class="p-2 bg-slate-900 rounded-md overflow-hidden">{{$item->keterangan}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
