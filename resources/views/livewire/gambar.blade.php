<div wire:poll.300s id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($data_gambar as $item)
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="{{asset('storage/'.$item->gambar)}}" style="width:100vw; max-height:100vh; object-fit: cover;" alt="Display Gambar">
            </div>
        @endforeach
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
