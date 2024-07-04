<div wire:poll class="fs-2">
    
        <div class="border border-white rounded-4 text-center text-white" style="background-color: rgba(0, 0, 0, 0.7)">
            <div class="d-flex flex-column pt-2">
                <span class="fs-3">Petugas Jumat</span>
                <span class="fs-3">{{(\Carbon\Carbon::now()->isFriday() ? \Carbon\Carbon::now() : \Carbon\Carbon::now()->next(\Carbon\Carbon::FRIDAY))->format('d-m-Y')}}</span>
            </div>
            <hr class="border-2 border-white">
            <div class="d-flex flex-column overflow-hidden">
                <span>KHOTIB</span>
                <span class="fs-3 text-black text-uppercase" style="background-color: greenyellow">{{$data_petugas_jumat->khotib}}</span>
            </div>
            <div class="d-flex flex-column">
                <span>IMAM</span>
                <span class="fs-3 text-black text-uppercase" style="background-color: cyan">{{$data_petugas_jumat->imam}}</span>
            </div>
            <div class="d-flex flex-column">
                <span>MUADZIN</span>
                <span class="fs-3" style="background-color: red">{{$data_petugas_jumat->muadzin}}</span>
            </div>
            <div class="d-flex flex-column mb-4">
                <span>BILAL</span>
                <span class="fs-3 text-black text-uppercase" style="background-color: orange">{{$data_petugas_jumat->bilal}}</span>
            </div>
        </div>
</div>