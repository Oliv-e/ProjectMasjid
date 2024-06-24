<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title', 'Masjid Al-Ikhlas')</title>
        @vite('resources/js/app.js')
        @vite('resources/css/app.css')
        @include('page.components.css') {{-- global css --}}
        @yield('css')
    </head>
    <body>
        @yield('content')
    </body>
    @include('page.components.scripts') {{-- global js--}}
    @yield('scripts')
</html>