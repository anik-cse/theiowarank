<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700%7CMontserrat:300,500%7COswald:400,500" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/frontend/css/font-awesome.min.css') }}">
            <!-- ALL CSS FILES -->
        <link rel="stylesheet" href="{{ mix('css/frontend/css/style.css') }}">
        <link rel="stylesheet" href="{{ mix('css/frontend/css/bootstrap.css') }}">
        <!-- MOB.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
        <link rel="stylesheet" href="{{ mix('css/frontend/css/mob.css') }}">
        @yield('css')
    </head>
    <body>
        <!-- Preloader -->
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>

        <x-side-bar />

        <x-header />
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <x-footer />
    </body>

    <!-- Scripts -->
    @livewireScripts
    <script src="{{ mix('js/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ mix('js/frontend/js/bootstrap.js') }}"></script>
    <script src="{{ mix('js/frontend/js/custom.js') }}"></script>
    @stack('scripts')
</html>