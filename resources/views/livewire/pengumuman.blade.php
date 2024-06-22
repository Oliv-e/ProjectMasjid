<div wire:poll>
    @isset($pengumuman)
        {{$pengumuman->content}}
    @else
        Tidak ada Pengumuman Terbaru!
    @endisset
</div>
