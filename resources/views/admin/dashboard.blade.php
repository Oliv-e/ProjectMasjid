
@livewireStyles

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <h2>
                Selamat Datang, <span class="">{{Auth::user()->name}}</span>
            </h2>
        </div>
    </x-slot>

    <div class="flex flex-wrap  justify-center">
        @livewire('chart')
        <div class="bg-white w-[70%] my-2 rounded-xl">
            <div class="flex  justify-between items-center my-2 p-6 text-gray-900 w-full">
                <span> Pengumuman</span>
                <a href="{{route('pengumuman')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Klik</a>
            </div>
            <div class="flex justify-between items-center p-6 text-gray-900">
                <span> Keuangan</span>
                <a href="{{route('keuangan')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Klik</a>
            </div>
            <div class="flex justify-between items-center p-6 text-gray-900">
                <span> Petugas Jumat</span>
                <a href="{{route('petugas.jumat')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Klik</a>
            </div>
            <div class="flex justify-between items-center p-6 text-gray-900">
                <span> Latar Belakang</span>
                <a href="{{route('gambar')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Klik</a>
            </div>
        </div>
    
    </div>

    
</x-app-layout>

@livewireScripts