<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <h2 class="capitalize hidden sm:block"> selamat datang, {{Auth::user()->name}} </h2>
        </div>
    </x-slot>

    <div class="hidden sm:block">
        <div class="py-12 flex flex-col w-full gap-2">
            <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between items-center p-6 text-gray-900">
                        <span>Manajemen Pengumuman</span>
                        <a href="{{route('pengumuman')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between items-center p-6 text-gray-900">
                        <span>Manajemen Keuangan</span>
                        <a href="{{route('keuangan')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between items-center p-6 text-gray-900">
                        <span>Manajemen Petugas Jumat</span>
                        <a href="{{route('petugas.jumat')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between items-center p-6 text-gray-900">
                        <span>Manajemen Latar Belakang</span>
                        <a href="{{route('gambar')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-between items-center p-6 text-gray-900">
                        <span>Aktivitas Saya</span>
                        <a href="{{route('history')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block sm:hidden">
        <div class="flex flex-col w-[100%] gap-2 my-2 rounded-xl">
            <div class="bg-white flex justify-between items-center p-6 text-gray-900">
                <span> Pengumuman</span>
                <a href="{{route('pengumuman')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
            </div>
            <div class="bg-white flex justify-between items-center p-6 text-gray-900">
                <span> Keuangan</span>
                <a href="{{route('keuangan')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
            </div>
            <div class="bg-white flex justify-between items-center p-6 text-gray-900">
                <span> Petugas Jumat</span>
                <a href="{{route('petugas.jumat')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
            </div>
            <div class="bg-white flex justify-between items-center p-6 text-gray-900">
                <span> Latar Belakang</span>
                <a href="{{route('gambar')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
            </div>
            <div class="bg-white flex justify-between items-center p-6 text-gray-900">
                <span> Aktivitas Saya</span>
                <a href="{{route('history')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Lihat</a>
            </div>
        </div>
    </div>    
</x-app-layout>

@livewireScripts