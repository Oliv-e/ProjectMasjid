<div wire:poll>
    @if ($this->visible == 'true')
        <div class="mx-4" style="background-color: rgba(0, 0, 0, 0.7)">
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
    @endif
</div>