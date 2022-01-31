@section('title', 'Админ панель')
@extends('layouts.panel')

@section('content')

<section class="create-block">
    <div class="create">
        <form action="{{ route('article.store') }}" method="POST" class="create__form" enctype="multipart/form-data">
            @csrf
            <div class="create__wrap">
                <p class="create__title">Название</p>
                <div class="create__inner">
                    <input type="text" name="title" class="create__input" value="{{ old('title') }}">
                    @if (session('errors'))
                        <span class="create__invalid">это поле обязательно для заполнения </span>
                    @endif
                </div>
            </div>
            <div class="create__wrap">
                <p class="create__title">Картинка (превью)</p>
                <input type="file" name="preview_img" class="create__inputfile">
                @if (session('errors'))
                    <span class="create__invalid">это поле обязательно для заполнения </span>
                @endif
            </div>
            <div class="create__wrap">
                <p class="create__title">Описание</p>
                <div class="create__inner">
                    <textarea name="desc" class="create__text">{{ old('desc') }}</textarea>
                    @if (session('errors'))
                        <span class="create__invalid">это поле обязательно для заполнения </span>
                    @endif
                </div>
            </div>
            <button class="create__btn" type="submit">Добавить <span>+</span></button>
        </form>
    </div>
</section>

<a href="{{ route('article.index') }}" class="back-link">
    Вернуться назад
    @include('svg.back')
</a>

@endsection
