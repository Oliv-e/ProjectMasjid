<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 text-gray-900">
                    <span>Halo, {{Auth::user()->name}}</span>
                </div>
            </div>
        </div>
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <span>Manajemen Pengumuman</span>
                    <a href="{{route('pengumuman')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Pengumuman</a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <span>Manajemen Keuangan</span>
                    <a href="{{route('keuangan')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Keuangan</a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <span>Manajemen Petugas Jumat</span>
                    <a href="{{route('petugas.jumat')}}" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Petugas Jumat</a>
                </div>
            </div>
        </div>
        {{-- <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <span>Manajemen Tata Letak</span>
                    <a href="" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Pengumuman</a>
                </div>
            </div>
        </div>
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <span>Manajemen Latar Belakang</span>
                    <a href="" class="p-2 px-4 bg-slate-900 hover:bg-slate-700 text-white border rounded-lg">Pengumuman</a>
                </div>
            </div>
        </div> --}}

    </div>
</x-app-layout>
