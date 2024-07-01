<div wire:poll>
    <div class="mx-4" style="background-color: rgba(0, 0, 0, 0.7)">
        {{-- <div class="fs-4 p-4 d-flex flex-column">
            <div class="d-flex text-center justify-content-between">
                <span class="w-25">TANGGAL</span>
                <span class="w-25">M/K</span>
                <span class="w-25">SALDO</span>
                <span class="w-25">KETERANGAN</span>
            </div>
        </div>
        @foreach ($data_keuangan as $index => $item)
        <div class="fs-6 my-1 d-flex justify-content-between text-center">
            <span class="w-25">{{($item->created_at)->format('d-m-Y')}}</span>
            <span class="w-25">{{$item->debet}}{{$item->kredit}}</span>
            <span class="w-25">{{$data_saldo[$index]}}</span>
            <span class="w-25 text-uppercase">{{$item->keterangan}}</span>
        </div>
        @endforeach --}}
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th class="fs-4 text-center">TANGGAL</th>
                    <th class="fs-4 text-center">JUMLAH</th>
                    <th class="fs-4 text-center">SALDO</th>
                    <th class="fs-4 text-center">KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_keuangan as $index => $item)
                    <tr class="@if($item->debet) table-success @else table-danger @endif">
                        <td class="fs-3 text-center">{{($item->created_at)->format('d-m-Y')}}</td>
                        <td class="fs-5 text-center align-middle">
                            @if($item->debet)
                                Rp. {{number_format($item->debet,0,',','.')}}
                            @else
                                Rp. {{number_format($item->kredit,0,',','.')}}
                            @endif
                        </td>
                        <td class="fs-5 text-center align-middle">Rp. {{number_format($data_saldo[$index],0,',','.')}}</td>
                        <td class="fs-3 text-center">{{$item->keterangan}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>