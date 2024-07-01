<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Akun') }}
        </h2>
    </x-slot>
    <div class="py-4 pt-8 max-w-7xl w-full mx-auto sm:px-6 md:px-8 flex justify-between">
        <a onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
        @session('error') <span class="text-sm text-red-500">{{ session('error') }}</span> @endsession
        @session('success') <span class="text-sm text-green-500">{{ session('success') }}</span> @endsession
        <a href="{{route('manage_user.create')}}">Tambah Akun <i class="bi bi-plus rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i></a>
    </div>
    <div class="hidden md:block py-4 flex flex-col w-full gap-2">
        <div class="md:max-w-7xl w-[90%] mx-auto sm:px-6 md:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($data as $item)
                    <div class="rounded-md flex flex-col gap-2 bg-slate-700 text-white p-4">
                        <div class="flex gap-2">
                            <span>{{$loop->iteration}}.</span>
                            <span>{{$item->name}}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span>{{$item->role}}</span>
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                                <div class="my-2">
                                    <a href="{{ route('manage_user.edit',$item->id)}}" class="border rounded-md p-2 hover:border-yellow-300 hover:bg-yellow-300 hover:text-black"><i class="bi bi-pen"></i></a>
                                    @if (Auth::user()->id != $item->id)
                                    <a onclick="confirmDelete(this)" data-url="{{ route('manage_user.delete', ['id' => $item->id]) }}" class="border rounded-md p-2 hover:border-red-500 hover:bg-red-500 hover:text-white" role="button"><i class="bi bi-trash"></i></a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="bg-slate-900 p-2 flex items-center justify-between rounded-md">
                            <span>{{$item->email}}</span>
                            <span>
                                @if ($item->email_verified_at)
                                    <i class="bi bi-patch-check-fill text-2xl hover:text-green-500"></i>
                                @else
                                    <i class="bi bi-patch-check text-2xl hover:text-red-500"></i>
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="max-w-7xl w-full mx-auto sm:px-6 md:px-8">
            <table class="mx-auto table-auto border-2 bg-slate-700 text-white border-slate-900">
                <thead>
                    <tr>
                        <th class="p-4 border-2">No</th>
                        <th class="p-4 border-2">Nama</th>
                        <th class="p-4 border-2">Role</th>
                        <th class="p-4 border-2">Email</th>
                        <th class="p-4 border-2">Status Verifikasi Email</th>
                        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                        <th class="p-4 border-2">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="p-4 border-2">{{$loop->iteration}}</td>
                            <td class="p-4 border-2">{{$item->name}}</td>
                            <td class="p-4 border-2">{{$item->role}}</td>
                            <td class="p-4 border-2">{{$item->email}}</td>
                            <td class="p-4 border-2">
                                @if ($item->email_verified_at)
                                    Terverifikasi
                                @else
                                    Tidak Terverifikasi
                                @endif
                            </td>
                            @if (Auth::user()->role == 'admin' || Auth::user()->role == 'super_admin')
                                <td class="p-4 border-2">
                                    <a href="{{ route('manage_user.edit',$item->id)}}" class="border rounded-md p-2 hover:bg-yellow-300 hover:text-black">Edit</a>
                                    @if (Auth::user()->id != $item->id)
                                    <a onclick="confirmDelete(this)" data-url="{{ route('manage_user.delete', ['id' => $item->id]) }}" class="border rounded-md p-2 hover:bg-red-400 hover:text-black" role="button">Hapus</a>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}
    </div>
</x-app-layout>
