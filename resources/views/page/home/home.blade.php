@extends('page.layout.master')

@section('content')
    <div class="position-absolute z-n1">
        @livewire('gambar')
    </div>
    <div class="d-flex p-4 justify-content-between">
        <div class="w-25 d-flex fs-1 align-items-center gap-2 rounded-4 border-white border" style="background-color: rgba(0,0,0,0.7)">
            <img src="{{ asset('gambar/logo.svg')}}" class="img-fluid p-2" width="100px" alt="Masjid Icon">
            <span class="fs-2 text-white">Masjid Nurul Huda</span>
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
        <div class="w-25 p-4">
            <div class="border border-white rounded-4 w-full text-white p-4 text-center" style="background-color: rgba(0, 0, 0, 0.7)">
                <span>{{now()->format('d-m-Y')}}</span>
            </div>
        </div>
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
    </script>
@endsection