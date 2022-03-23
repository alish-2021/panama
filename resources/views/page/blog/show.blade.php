@section('title', 'Главная')
@extends('layouts.page')

@section('content')

    <section class="top-block mb-30">
        <div class="container">
            <h1 class="block-title mb-20">{{$blog->title}}</h1>
            <img src="{{ asset('storage'). '/'. $blog->img }}" alt="" class="mb-10">
            <p>{{$blog->desc}}</p>
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
