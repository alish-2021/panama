<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Авторизация</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
</head>
<body>

<section class="login-block">
    <div class="container">
        <div class="login">
            <div class="login__wrap">
                <img src="{{ asset('images/sign.svg') }}" alt="" class="login__img">
                <h1 class="login__title">Регистрация</h1>
                <form method="POST"  class="login__form"  action="{{ route('register') }}">
                    @csrf

                    <div class="login__input-wrap">
                        <input id="name" type="text" class="login__input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Ваше имя">
                    </div>

                    <div class="login__input-wrap">
                        <input id="login" type="text" class="login__input" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="Ваш логин">
                    </div>

                    <div class="login__input-wrap">
                        <input id="email" type="email" class="login__input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ваша почта">
                    </div>

                    <div class="login__input-wrap">
                        <input id="password" type="password" class="login__input" name="password" value="{{ old('password') }}" required autocomplete="new-password" autofocus placeholder="Ваш пароль">
                    </div>

                    <div class="login__input-wrap">
                        <input id="password-confirm" type="password" class="login__input" name="password_confirmation" required autocomplete="new-password" placeholder="Подтверждение пароля">
                    </div>

                    <button type="submit" class="login__btn">
                        Регистрация
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

