<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Akun') }}
        </h2>
    </x-slot>
    <div class="block py-8 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full flex justify-between mx-auto sm:px-6 lg:px-8">
            <a class="mx-4" onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
        </div>
        <div class="max-w-xl w-full mx-auto sm:px-6 md:px-8">
            <div class="mx-auto px-4">
                <form action="{{route('manage_user.create')}}" method="POST" class="my-12 flex flex-col"> 
                    @csrf   
                    <label for="name" class="my-2"><span class="text-sm text-red-500">*</span> Nama : </label>
                    <input type="text" name="name" value="" class="rounded-md">
                    <label for="email" class="my-2"><span class="text-sm text-red-500">*</span> Email : </label>
                    <input type="email" name="email" value="" class="rounded-md">
                    @error('email') <span class="text-sm text-red-500">Email ini sudah dipakai</span> @enderror
                    @if(Auth::user()->role == 'super_admin')
                    <label for="role" class="my-2">Role : </label>
                        <select name="role" class="rounded-md">
                            <option value="moderator">Moderator</option>
                            <option value="admin">Admin</option>
                            <option value="super_admin">Super Admin</option>
                        </select>
                        <label for="eva" class="my-2">Email Verified At : </label>
                        <input type="date" name="eva" class="rounded-md">
                    @endif
                    <label for="password" class="my-2"><span class="text-sm text-red-500">*</span> Password : </label>
                    <input type="password" name="password" value="" class="rounded-md">
                    <label for="password" class="my-2"><span class="text-sm text-red-500">*</span> Konfirmasi Password : </label>
                    <input type="password" name="password_confirmation" value="" class="rounded-md">
                    @session('error') <span class="text-sm text-red-500">Password Tidak Sama</span> @endsession
                    
                    <button type="submit" class="rounded-md border bg-slate-900 hover:bg-slate-700 text-white py-2 mt-4">Buat</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-app-layout>
