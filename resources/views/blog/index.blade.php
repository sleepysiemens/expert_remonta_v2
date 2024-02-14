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
            @include('blocks.why_new')
            @include('blocks.popular_services')
            @include('blocks.reviews_new')

    @endforeach

@section('meta-description')
    @foreach ($seos as $seo)
        {{db_translate($seo->meta_ru, $seo->meta_kz)}}
    @endforeach
@endsection

@section('seo-title')
    @foreach ($seos as $seo)
        {{db_translate($seo->seo_ru, $seo->seo_kz)}}
    @endforeach
@endsection

