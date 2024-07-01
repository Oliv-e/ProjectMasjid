@extends('page.layout.master')

@section('content')
    <div class="container-fluid fs-1 d-flex p-4 justify-content-between align-content-center m-0" style="align-items: center; background-color: rgba(0, 0, 0, 0.7);">
        <div class="text-white d-flex gap-2 align-items-center fs-1">
            <img src="{{ asset('gambar/logo.svg')}}" class="img-fluid p-2" alt="">
            <p style="font-size: 23px; font-weight: 500; margin: 0;">Masjid Al-Ikhlas</p>

        </div>
        <div class="d-flex align-items-center">
            @livewire('countdown')
        </div>
        <div class="d-flex fs-1">
            <div class="d-none d-sm-flex text-white" style="font-size: 25px;">
                <span id="hrs">00</span> : <span id="min">00</span> : <span id="sec">00</span>
            </div>
            <div class="d-flex d-sm-none">
                @if (Route::has('login'))
                    @auth
                        <a class="login" href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a class="login" href="{{route('login')}}">masuk</a>
                        <a class="login" href="{{route('register')}}">register</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>

    <main class="overflow-hidden">
        @livewire('gambar')
    
        <div style="position: fixed; top: 25%; left: 10%; tranform: translate(-50%, -50%); background-color: rgba(0, 0, 0, 0.7);; color: white; padding: 10px, border-radius: 18px; max-width: 100%; width: 80%;">
            <div style="display: flex; justify-content: space-evenly; align-items: center; padding: 0;">
                @livewire('jadwal')
            </div>
        </div>
    </main>


    <div class="container" style="position: fixed; top: 55%; left: 15%; tranform: translate(-50%, -50%); background-color: white; color: rgb(0, 0, 0); padding: 10px, border-radius: 18px; max-width: 80%; width: 70%;">
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
    </div>

    <div class="container-fluid p-2 fs-1 bg-primary text-white d-flex w-full" style="position: fixed; inset-inline-end: 0; inset-inline-start: 0; z-index: 100; bottom: 0;">
        @livewire('pengumuman')
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