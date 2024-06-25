<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Latar Belakang') }}
        </h2>
    </x-slot>
    <div class="py-12 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full flex justify-between mx-auto sm:px-6 lg:px-8">
            <a onclick="history.back()"><i class="bi bi-arrow-left rounded-lg bg-slate-900 hover:bg-slate-600 text-white px-4 py-2"></i> Kembali</a>
        </div>
    </div>
    <div class="py-4 flex flex-col w-full gap-2">
        <div class="max-w-7xl w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <span class="text-xl">Preview Latar</span>
                    <div class="p-2 mt-4 bg-slate-300 mb-2 rounded-md">
                        <img src="{{ asset('storage/'.$gambar->gambar) }}" id="preview-image" alt="preview-image" class="rounded-md">
                    </div>
                    @if(session()->has('success'))
                        <div>
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div>
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <form action="{{route('gambar.edit',$gambar->id)}}" class="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="my-2 flex flex-col">
                            <label class="my-2">Pilih Gambar <span class="text-red-500">*</span></label>
                            <input type="file" value="{{asset('storage/'.$gambar->gambar)}}" name="gambar" id="upload-image" class="p-2 rounded-md bg-slate-300">
                        </div>
                        <div class="my-2 flex flex-col">
                            <label class="my-2">Opsi Ditampilkan <span class="text-red-500">*</span></label>
                            <select name="display" class="rounded-md">
                                <option value="false" hidden>Tidak</option>
                                <option value="true">Ya</option>
                                <option value="false">Tidak</option>
                            </select>
                        </div>
                        <div class="my-2 flex gap-2">
                            <button type="submit" class="p-2 px-4 rounded-md text-white" style="background-color: #65a30d">Ubah</button>
                            <button type="reset" class="p-2 px-4 rounded-md text-white" style="background-color: #f59e0b;">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(() => {
                const photoInp = $("#upload-image");
                let file;
    
                photoInp.change(function (e) {
                    file = this.files[0];
                    if (file) {
                        let reader = new FileReader();
                        reader.onload = function (event) {
                            $("#preview-image")
                                .attr("src", event.target.result);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
    </script>
</x-app-layout>
