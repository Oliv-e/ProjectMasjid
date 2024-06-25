@extends('page.layout.master')

@section('content')
    <div class="container-fluid fs-1 d-flex p-4 bg-success justify-content-between">
        <div class="bg-warning d-flex gap-2 align-items-center fs-1">
            <img src="{{ asset('gambar/logo.svg')}}" class="img-fluid" alt="">
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
        {{-- <div class="row bg-success py-4">
            <div class="col-4 p-2 text-center bg-primary">
                @livewire('petugas-jumat')
            </div>
            <div class="col-4 p-2 text-center bg-warning">
                @livewire('keuangan')
            </div>
            <div class="col-4 p-2 text-center bg-secondary">
                @livewire('gambar')
            </div>
        </div> --}}
        @livewire('gambar')
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