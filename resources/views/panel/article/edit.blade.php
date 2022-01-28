@section('title', 'Админ панель')
@extends('layouts.panel')

@section('content')

    <section class="create-block">
        <div class="create">
            <form action="{{ route('article.update', $article) }}" method="POST" class="create__form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $article->id }}">

                <div class="create__wrap">
                    <p class="create__title">Название</p>
                    <div class="create__inner">
                        <input type="text" name="title" class="create__input" value={{$article->title}}>
                        @if (session('errors'))
                            <span class="create__invalid">это поле обязательно для заполнения </span>
                        @endif
                    </div>
                </div>
                <div class="create__wrap">
                    <p class="create__title">Мини описнаие (превью)</p>
                    <div class="create__inner">
                        <textarea class="create__text" name="preview_desc">{{ $article->preview_desc }}</textarea>
                        @if (session('errors'))
                            <span class="create__invalid">это поле обязательно для заполнения </span>
                        @endif
                    </div>
                </div>
                <div class="create__wrap">
                    <p class="create__title">Картинка (превью)</p>
                    <input type="file" name="preview_img" class="create__inputfile" value="{{ $article->preview_img }}">
                </div>
                <div class="create__wrap">
                    <p class="create__title">Описание</p>
                    <div class="create__inner">
                        <textarea name="desc" class="create__text">{{ $article->desc }}</textarea>
                        @if (session('errors'))
                            <span class="create__invalid">это поле обязательно для заполнения </span>
                        @endif
                    </div>
                </div>
                <div class="create__wrap">
                    <p class="create__title">Картинка</p>
                    <div class="create__inner">
                        <input type="file" name="img" class="create__inputfile" value="{{ $article->img }}">
                    </div>
                </div>
                <button class="create__btn" type="submit">Обновить <span>+</span></button>
            </form>
        </div>
    </section>

    <a href="{{ route('article.index') }}" class="back-link">
        Вернуться назад
        @include('svg.back')
    </a>

@endsection
