<div wire:poll>
    @foreach($data_gambar as $item)
        <img src="{{asset('storage/'.$item->gambar)}}" width="100" alt="">
    @endforeach
</div>
