<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
                <h1 class="login__title">Авторизация</h1>
                <form method="POST" class="login__form" action="{{ route('login') }}">
                    @csrf
                    <div class="login__input-wrap">
                        <input class="login__input" id="login" placeholder="Логин" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>
                        @error('login')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="login__input-wrap">
                        <input id="password" class="login__input" placeholder="Пароь" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="login__btn">
                        {{ __('Вход') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
