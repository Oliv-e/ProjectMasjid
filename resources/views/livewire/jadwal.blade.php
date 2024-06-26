<div class="d-flex text-center gap-5 p-3" >
    @foreach($data as $nama => $waktu)
    <div class="subuh " >
        <p>{{$nama}}</p>
        <span id="jadwalSubuh">{{$waktu}}</span>
    </div>
    @endforeach 
</div>