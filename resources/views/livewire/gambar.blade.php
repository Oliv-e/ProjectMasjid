<div wire:poll.300s id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($data_gambar as $item)
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="{{asset('gambar/masjid.jpeg')}}" class="d-block w-100">
            </div>
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="{{asset('gambar/masjid2.jpg')}}" class="d-block w-100">
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