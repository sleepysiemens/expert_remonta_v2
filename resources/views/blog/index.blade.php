@extends('Layouts.wrapper')

@section('service')
nav-link-selected
@endsection


        @section('page_title')
            {{$blog->title}} – Эксперт Ремонта
        @endsection

        @section('content')
            @include('blocks.welcome')
            @include('blocks.path-category')
            @include('blocks.about_category')
            @include('blocks.photo-slider')
            @include('blocks.why')
            @include('blocks.popular_services')
            @include('blocks.reviews')

    @endforeach

@section('meta-description')
    @foreach ($seos as $seo)
        {{$seo->meta}}
    @endforeach
@endsection

@section('seo-title')
    @foreach ($seos as $seo)
        {{$seo->seo}}
    @endforeach
@endsection

