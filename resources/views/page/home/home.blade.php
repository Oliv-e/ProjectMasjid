@extends('page.layout.master')

@section('content')
    <div class="container-fluid fs-1 d-flex p-4 bg-black bg-opacity-50 justify-content-between align-content-center m-0" style="align-items: center;">
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
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="5000">
                    <img src="img/slide4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="img/slide5.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="5000">
                    <img src="img/slide6.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon d-none" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon d-none" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    
        <div style="position: fixed; top: 20%; left: 10%; tranform: translate(-50%, -50%); background-color: white; color: rgb(0, 0, 0); padding: 10px, border-radius: 18px; max-width: 30%; width: 20%;">
            <div style="display: flex; justify-content: space-evenly; align-items: center; padding: 0;">
                @livewire('jadwal')
            </div>
        </div>
        <div style="z-index: 10; position: fixed; right: 20%; left: 10%; tranform: translate(-50%, -50%); background-color: white; color: rgb(0, 0, 0); padding: 10px, border-radius: 18px; max-width: 30%; width: 20%;">
            <div style="display: flex; justify-content: space-evenly; align-items: center; padding: 0;">
                @livewire('keuangan')
            </div>
        </div>
    </main>


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

    <div class="container-fluid p-4 fs-1 bg-danger d-flex w-full bg-opacity-50">
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