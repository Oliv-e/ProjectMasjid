<div wire:poll class="text-white p-4 border border-white rounded-4 d-flex flex-column text-center" style="background-color: rgba(0, 0, 0, 0.7)">
    @foreach($data as $nama => $waktu)
    <div class="d-flex flex-row align-items-center justify-content-between w-full">
        <span class="fs-4 text-uppercase">{{$nama}}</span>
        <span class="fs-2 bg-white p-2 text-black my-1 calc">{{$waktu}}</span>
    </div>
    @endforeach 
    <style>
        .calc {
            font-family: 'Digital Dismay', sans-serif;
        }
    </style>
</div>