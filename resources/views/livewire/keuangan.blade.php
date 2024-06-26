<div style="z-index: 10" class="block">
    <table class="mx-auto table-auto border-collapse border border-slate-500">
        <thead>
            <tr>
                <th class="px-4 py-2 border border-slate-600">No.</th>
                <th class="px-4 py-2 border border-slate-600">Tgl</th>
                <th class="px-4 py-2 border border-slate-600">Debet</th>
                <th class="px-4 py-2 border border-slate-600">Kredit</th>
                <th class="px-4 py-2 border border-slate-600">Saldo</th>
                <th class="px-4 py-2 border border-slate-600">Keterangan</th>
            </tr>
        </thead>
        <tbody wire:poll>
            @foreach ($data_keuangan as $index => $item)
            <tr class="text-center">
                <td class="border border-slate-600"><span class="p-4">{{$index + 1}}</span></td>
                <td class="border border-slate-600">
                    <span class="p-4">{{ date('Y-m-d', strtotime($item->created_at))}}</span>
                </td>
                <td class="border border-slate-600">
                    <span class="p-4">{{$item->debet}}</span>
                </td>
                <td class="border border-slate-600">
                    <span class="p-4">{{$item->kredit}}</span>
                </td>
                <td class="border border-slate-600">
                    <span class="p-4">{{$data_saldo[$index]}}</span>
                </td>
                <td class="border border-slate-600">
                    <span class="p-4">{{$item->keterangan}}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>