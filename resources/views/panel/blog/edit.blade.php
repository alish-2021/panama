@section('title', 'Админ панель')
@extends('layouts.panel')

@section('content')

    <section class="create-block">
        <div class="create">
            <form action="{{ route('blog.update', $blog) }}" method="POST" class="create__form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $blog->id }}">

                <div class="create__wrap">
                    <p class="create__title">Название</p>
                    <div class="create__inner">
                        <input type="text" name="title" class="create__input" value={{$blog->title}}>
                        @if (session('errors'))
                            <span class="create__invalid">это поле обязательно для заполнения </span>
                        @endif
                    </div>
                </div>
                <div class="create__wrap">
                    <p class="create__title">Картинка (превью)</p>
                    <input type="file" name="preview_img" class="create__inputfile" value="{{ $blog->preview_img }}">
                </div>
                <div class="create__wrap">
                    <p class="create__title">Картинка</p>
                    <input type="file" name="img" class="create__inputfile" value="{{ $blog->img }}">
                </div>
                <div class="create__wrap">
                    <p class="create__title">Описание (превью)</p>
                    <div class="create__inner">
                        <textarea name="preview_desc" class="create__text">{{ $blog->preview_desc }}</textarea>
                        @if (session('errors'))
                            <span class="create__invalid">это поле обязательно для заполнения </span>
                        @endif
                    </div>
                </div>
                <div class="create__wrap">
                    <p class="create__title">Описание</p>
                    <div class="create__inner">
                        <textarea name="desc" class="create__text">{{ $blog->desc }}</textarea>
                        @if (session('errors'))
                            <span class="create__invalid">это поле обязательно для заполнения </span>
                        @endif
                    </div>
                </div>
                <button class="create__btn" type="submit">Обновить <span>+</span></button>
            </form>
        </div>
    </section>

    <a href="{{ route('blog.index') }}" class="back-link">
        Вернуться назад
        @include('svg.back')
    </a>

@endsection
