@section('title', 'Главная')
@extends('layouts.page')

@section('content')

    <section class="o-kompanii-block top-block">
        <div class="container">
            @foreach($blogs as $blog)
                <div class="o-kompanii first mb-60">
                    <div class="o-kompanii__img">
                        <img src="{{ asset('storage'). '/'. $blog->preview_img }}" alt="">
                    </div>
                    <div class="o-kompanii__wrap">
                        <p class="block-title mb-30">{{ $blog->title }}</p>
                        <p>
                            {{ $blog->preview_desc }}
                        </p>
                        <a href="blog/{{$blog->id}}" class="btn1">Подробнее</a>
                    </div>
                </div>
            @endforeach
            {{ $blogs->links() }}
        </div>
    </section>

    <section class="partnery-block mb-100">
        <div class="container">
            <div class="partnery-block__wrap">
                <p class="partnery-block__title">Наши клиенты и партнеры</p>
                @include('site.partnery')
            </div>
        </div>
    </section>

@endsection
