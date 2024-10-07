<div wire:poll class="fs-4">
    <div class="border border-white rounded-4 text-center text-white" style="background-color: rgba(0, 0, 0, 0.7)">
        <div class="d-flex flex-column pt-2">
            <span class="fs-3">Petugas Jumat</span>
            <span class="fs-4">{{(\Carbon\Carbon::now()->isFriday() ? \Carbon\Carbon::now() : \Carbon\Carbon::now()->next(\Carbon\Carbon::FRIDAY))->format('d-m-Y')}}</span>
        </div>
        <hr class="border-2 border-white">
        @if($this->type_petugas != 'Tarawih')
        <div class="d-flex flex-column overflow-hidden">
            <span>KHOTIB</span>
            <span class="fs-4 text-black text-uppercase" style="background-color: greenyellow">{{$khotib}}</span>
        </div>
        @endif
        <div class="d-flex flex-column">
            <span>IMAM</span>
            <span class="fs-4 text-black text-uppercase" style="background-color: cyan">{{$imam}}</span>
        </div>
        <div class="d-flex flex-column mb-4">
            <span>MUADZIN</span>
            <span class="fs-4 text-uppercase" style="background-color: red">{{$muadzin}}</span>
        </div>
        @if($this->type_petugas == 'Eid')
            <div class="d-flex flex-column mb-4">
                <span>BILAL</span>
                <span class="fs-4 text-black text-uppercase" style="background-color: orange">{{$bilal}}</span>
            </div>
        @endif
    </div>
</div>
