<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title',  env('APP_NAME') )</title>
        @include('page.components.css') {{-- global css --}}
        @yield('css')
    </head>
    <body>
        <div class="res">
            @yield('content')
        </div>
        <div class="d-block d-sm-none d-flex flex-column align-items-center justify-content-center w-full" style="min-height: 100vh">
            <span class="my-2">Please Open in PC</span>
            @if (Auth::check())
                <a href="{{route('dashboard')}}" class="text-black text-decoration-none px-4 py-2 border border-black rounded-2">Dashboard</a>
            @else
                <a href="{{route('login')}}" class="text-black text-decoration-none px-4 py-2 border border-black rounded-2">Login</a>
            @endif
        </div>
    </body>
    @include('page.components.scripts') {{-- global js--}}
    @yield('scripts')
</html>
