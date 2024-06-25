@extends('page.layout.master')

@section('content')
    <div class="container-fluid fs-1 d-flex p-4 bg-success justify-content-between">
        <div class="bg-warning d-flex gap-2 align-items-center fs-1">
            <img src="img/logo.svg" class="img-fluid" alt="">
            Masjid Al-Ikhlas
        </div>
        <div class="d-flex align-items-center">
            @livewire('countdown')
        </div>
        <div class="d-flex fs-1">
            <div class="d-none d-sm-flex">
                <span id="hrs">00</span> : <span id="min">00</span> : <span id="sec">00</span>
            </div>
            <div class="d-flex d-sm-none">
                @if (Route::has('login'))
                    @auth
                        <a class="login" href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a class="login" href="{{route('login')}}">masuk</a>
                        <a class="" href="{{route('register')}}">Register</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <div class="container bg-white p-4 d-flex fs-2">
        <div class="mx-auto">
            @livewire('jadwal')
        </div>
    </div>

    <div class="container">
        <div class="row bg-success py-4">
            {{-- <div class="col-4 p-2 text-center bg-danger">
                <span class="fs-2">Jadwal Pengurus Jumat</span>
                <div class="row g-2 fs-3">
                    <div class="col-6">
                        Muadzin
                    </div>
                    <div class="col-6">
                        Syarif Muhammad Alhaiza
                    </div>
                    <div class="col-6">
                        Khutbah
                    </div>
                    <div class="col-6">
                        Muhammad Vito
                    </div>
                </div>
            </div> --}}
            <div class="col-4 p-2 text-center bg-warning">
                @livewire('keuangan')
                {{-- <span class="fs-3">Statistik Keuangan</span>
                <div class="row g-2 fs-3">
                    <div class="col-6">
                        Pemasukan
                    </div>
                    <div class="col-6">
                        Rp. 90.000.000
                    </div>
                    <div class="col-6">
                        Pengeluaran
                    </div>
                    <div class="col-6">
                        Rp. 45.000.000
                    </div>
                </div>
                <div class="row g-2 fs-3">
                    <div class="col-6">
                        Beli Sapi Qurban
                    </div>
                    <div class="col-6">
                        Rp. 24.234.000
                    </div>
                    <div class="col-6">
                        Infaq Masjid
                    </div>
                    <div class="col-6">
                        Rp. 2.000.000
                    </div>
                </div> --}}
            </div>
            {{-- <div class="col-4 p-2 text-center bg-primary">
                <span class="fs-3">Carousel Gambar</span>
                <div class="row g-2 fs-3">
                    <div class="col-6">
                        Muadzin
                    </div>
                    <div class="col-6">
                        Syarif Muhammad Alhaiza
                    </div>
                    <div class="col-6">
                        Khutbah
                    </div>
                    <div class="col-6">
                        Muhammad Vito
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    <div class="container-fluid p-4 fs-1 bg-danger d-flex w-full">
        @livewire('pengumuman')
    </div>
@endsection
@section('scripts')
    <script>
        let hrs = document.getElementById("hrs");
        let min = document.getElementById("min");
        let sec = document.getElementById("sec");

        setInterval(() => {
            let currentTime = new Date();
            
            hrs.innerHTML = String(currentTime.getHours()).padStart(2, '0');
            min.innerHTML = String(currentTime.getMinutes()).padStart(2, '0');
            sec.innerHTML = String(currentTime.getSeconds()).padStart(2, '0');
        }, 1000);
    </script>
@endsection