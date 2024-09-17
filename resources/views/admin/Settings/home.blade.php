<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Settings') }}
            </h2>
        </div>
    </x-slot>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <div>
                        <span>Ganti Nama Masjid</span> <br>
                        <span class="text-sm text-gray-500"><span class="text-red-500">* </span>Setelah mengganti nama masjid, server akan merestart ulang aplikasi anda</span>
                    </div>
                    <div>
                        <form action="{{route('settings.change_name')}}" method="POST">
                            @csrf
                            <input type="text" name="nama_masjid" class="rounded-md bg-gray-100" value="{{ env('APP_NAME') }}">
                            <button type="submit" class="rounded-md text-green-500 hover:font-bold px-4 py-2">Ganti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

@livewireScripts
