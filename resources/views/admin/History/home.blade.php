<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aktivitas Saya') }}
        </h2>
    </x-slot>
    <div class="hidden md:block py-4 flex flex-col w-full gap-2 bg-slate-900">
        <div class="max-w-7xl w-full mx-auto sm:px-6 md:px-8">
            <table class="mx-auto table-auto border-2 bg-slate-700 text-white border-slate-900">
                <thead>
                    <tr>
                        <th class="p-4 border-2">No</th>
                        <th class="p-4 border-2">Bagian</th>
                        <th class="p-4 border-2">Aktivitas</th>
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                        <th class="p-4 border-2">oleh</th>
                        @endif
                        <th class="p-4 border-2">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="p-4 border-2">{{$loop->iteration}}</td>
                            <td class="p-4 border-2">{{$item->bagian}}</td>
                            <td class="p-4 border-2">{{$item->aktivitas}}</td>
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                                <td class="p-4 border-2">{{$item->oleh}}</td>
                            @endif
                            <td class="p-4 border-2">{{$item->keterangan}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
