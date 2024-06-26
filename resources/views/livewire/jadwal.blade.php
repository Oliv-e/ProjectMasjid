<div class=" text-center p-3 flex-col" >
    @foreach($data as $nama => $waktu)
    <div class="subuh " >
        <p>{{$nama}}</p>
        <span id="jadwalSubuh">{{$waktu}}</span>
    </div>
    @endforeach 
</div>