<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<header id="header">
    @include('site.header')
</header>

<main>
    @yield('content')
</main>

@include('site.footer')

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
</body>
</html>
