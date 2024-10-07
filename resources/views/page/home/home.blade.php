@extends('page.layout.master')

@section('content')
    <div id="content1" class="position-absolute w-full" style="transition: opacity 1s; opacity: 0">
        <div class="position-absolute z-n1">
            @livewire('gambar')
        </div>
        <div class="d-flex px-4 py-2 justify-content-between w-full">
            <div class="d-flex fs-1 align-items-center px-4 gap-2 rounded-4 border-white border" style="width: 74%!important; background-color: rgba(0,0,0,0.7)">
                <img src="{{ asset('gambar/logo.svg')}}" class="img-fluid p-2" width="100px" alt="Masjid Icon">
                <span class="fs-2 text-white">{{ env('APP_NAME') }}</span>
            </div>
            <div class="w-25 text-white border-white border rounded-4" style="background-color: rgba(0,0,0,0.7)">
                <div class="fs-1 text-center">
                    <span id="hrs">00</span> : <span id="min">00</span> : <span id="sec">00</span>
                </div>
                <div>
                    <span>@livewire('countdown')</span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between px-4">
            <div class="w-25">
                @livewire('petugas-jumat')
            </div>
            <div class="w-50">
                @livewire('keuangan')
            </div>
            <div class="w-25">
                @livewire('jadwal')
            </div>
        </div>
        <div class="fs-1 d-flex">
            <div class="w-75 p-4">
                @livewire('pengumuman')
            </div>
            <div class="w-25 pt-4 pe-4">
                <div class="border border-white rounded-4 w-full text-white p-4 text-center" style="background-color: rgba(0, 0, 0, 0.7)">
                    <span>{{now()->format('d-m-Y')}}</span>
                </div>
            </div>
        </div>
    </div>

    <div id="content2" class="position-absolute" style="transition: opacity 1s; opacity: 0">
        heel
    </div>
    
    <div id="content3" class="position-absolute" style="transition: opacity 1s; opacity: 0">
        hiil
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

            if (currentTime.getHours() === 23 && currentTime.getMinutes() === 59 && currentTime.getSeconds() === 59) {
                location.reload();
            }
        }, 1000);

        let divs = document.querySelectorAll('#content1, #content2, #content3 ');
        let currentDiv = 0;

        divs[currentDiv].style.opacity = 1;

        setInterval(() => {
            divs[currentDiv].style.opacity = 0;
            currentDiv = (currentDiv + 1) % divs.length;
            divs[currentDiv].style.opacity = 1;
        }, 5000);
    </script>
@endsection
