<div wire:poll>
    <div class="text-white border border-white rounded-4 p-4 pb-2" style="background-color: rgba(0, 0, 0,0.7)">
        @isset($pengumuman)
            <marquee behavior="scroll" scrollamount="10" direction="left">{{$pengumuman->content}}</marquee>
        @else
            <marquee behavior="scroll" direction="left">Tidak ada Pengumuman Terbaru!</marquee>
        @endisset
    </div>
</div>
