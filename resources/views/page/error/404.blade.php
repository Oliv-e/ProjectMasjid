@extends('page.layout.master')

@section('content')
    <div class="position-absolute z-n1">
        @livewire('gambar')
    </div>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column gap-2 p-4 align-items-center bg-white rounded-4">
            <img src="{{asset('gambar/logo.svg')}}" width="100" alt="IMG LOGO MASJID">
            <span class="text-danger fs-1">Err 404 Not Found</span>
            <a href="{{route('home')}}" class="text-white bg-success border rounded-2 p-2 text-decoration-none"><i class="bi bi-house-fill me-2"></i>Back To Home</a>
        </div>
    </div>
@endsection