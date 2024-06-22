<div class="d-flex gap-4 text-center">
    @foreach($data as $nama => $waktu)
    <div class="subuh">
        <p>{{$nama}}</p>
        <span id="jadwalSubuh">{{$waktu}}</span>
    </div>
    @endforeach 
</div>