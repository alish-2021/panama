@section('title', 'Админ панель')
@extends('layouts.panel')

@section('content')

<section class="user-block">
    <div class="user-block__wrap">
        <a href="{{ route('article.create') }}" class="user-block__btn">Добавить блог <span>+</span></a>
    </div>
    @if (session('success'))
        <p class="user-block__success">{{ session('success') }}</p>
    @endif

    <section class="user-list">
        @foreach($articles as $article)
        <div class="user-list__item">
            <div class="user-list__id">
                {{$article->id}}
            </div>
            <div class="user-list__title">
                {{$article->title}}
            </div>
            <div class="user-list__desc">
                {{Str::limit($article->preview_desc, 90)}}
            </div>
            <div class="user-list__btns">
                <a href="{{ route('article.edit', $article->id) }}"><img src="{{asset('images/admin/edit.svg')}}" alt=""></a>
                <form action="{{ route('article.destroy', $article->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><img src="{{asset('images/admin/cart.svg')}}" alt=""></button>
                </form>
            </div>
        </div>
        @endforeach
    </section>


</section>
<a href="{{ route('panel.index') }}" class="back-link">
    Вернуться на главную
    @include('svg.back')
</a>

@endsection
