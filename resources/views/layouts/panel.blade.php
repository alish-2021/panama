<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>

<header class="header">
    <div class="header__wrap">
        <a href="/" class="header__logo">
            <img src="{{ asset('images/admin/logo.svg') }}" alt="">
        </a>
        <div class="header__cms">
            CMS
        </div>
    </div>
    <nav class="header__nav">
        <div class="header__user">
            <div class="header__user-img">
                <img src="{{ asset('images/admin/user.svg') }}" alt="">
            </div>
            <div class="header__user-title">{{ Auth::user()->login }}</div>
        </div>
        <ul class="header__ul">
            <li>
                <a href="{{route('panel.index')}}" class="header__link">
                    <img src="{{ asset('images/icon/home.svg') }}" alt="">
                    Главная
                </a>
            </li>
            <li>
                <a href="/" class="header__link">
                    <img src="{{ asset('images/icon/users.svg') }}" alt="">
                    Пользователи
                </a>
            </li>
            <li>
                <a href="{{route('article.index')}}" class="header__link">
                    <img src="{{ asset('images/icon/newspaper.svg') }}" alt="">
                    Cтатьи
                </a>
            </li>
            <li>
                <a href="{{route('blog.index')}}" class="header__link">
                    <img src="{{ asset('images/icon/newspaper.svg') }}" alt="">
                    Блог
                </a>
            </li>
        </ul>
        <a class="header__logout" href="{{ route('logout') }}" onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
            <img src="{{ asset('images/admin/logout.svg') }}" alt="">
            Выйти
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>

    </nav>
</header>

<main>
    @yield('content')
</main>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
