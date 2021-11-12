<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        ::-webkit-scrollbar-track {
            background: #71a5ff;
        }

        ::-webkit-scrollbar-thumb {
            background: #CBD5E0;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #9fc5ff;
        }

        ::scroller {}

    </style>
    @livewireStyles()
</head>
<body class="h-screen font-sans antialiased leading-none bg-gray-100" style="background-image: url({{ url('/storage/bg/books_3-wallpaper-1366x768.jpg') }})">
<div class="flex flex-col">
@auth
    @livewire('nav.nav-bar')
@endauth
    <!-- Page Content -->
    <div>
        {{ $slot }}
    </div>
    <!-- End Page Content -->
@livewireScripts()
</div>
</body>
</html>
