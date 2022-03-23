@section('title', 'Админ панель')
@extends('layouts.panel')

@section('content')

    <section class="user-block">
        <div class="user-block__wrap">
            <a href="{{ route('blog.create') }}" class="user-block__btn">Добавить блог <span>+</span></a>
        </div>
        @if (session('success'))
            <p class="user-block__success">{{ session('success') }}</p>
        @endif

        <div class="user-list">
            @foreach($blogs as $blog)
                <div class="user-list__item">
                    <div class="user-list__id">
                        {{$blog->id}}
                    </div>
                    <div class="user-list__title">
                        {{$blog->title}}
                    </div>
                    <div class="user-list__desc">
                        {{Str::limit($blog->preview_desc, 90)}}
                    </div>
                    <div class="user-list__btns">
                        <a href="{{ route('blog.edit', $blog->id) }}"><img src="{{asset('images/admin/edit.svg')}}" alt=""></a>
                        <form action="{{ route('blog.destroy', $blog->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><img src="{{asset('images/admin/cart.svg')}}" alt=""></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <a href="{{ route('panel.index') }}" class="back-link">
        Вернуться на главную
        @include('svg.back')
    </a>

@endsection
