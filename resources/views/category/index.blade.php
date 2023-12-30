@extends('Layouts.wrapper')

@section('service')
nav-link-selected
@endsection

    @foreach ($categories as $category)

        @section('page_title')
            {{$category->title}} – Эксперт Ремонта
        @endsection

        @section('content')
            @include('blocks.welcome-category')
            @include('blocks.path-category')
            @include('blocks.about_category')
            @include('blocks.why')
            @include('blocks.popular_services')
            @include('blocks.reviews')
        @endsection

    @endforeach

@section('meta-description')
    @foreach ($seos as $seo)
        {{app()->db_translate($seo->meta_ru, $seo->meta_kz)}}
    @endforeach
@endsection

@section('seo-title')
    @foreach ($seos as $seo)
        {{app()->db_translate($seo->seo_ru, $seo->seo_kz)}}
    @endforeach
@endsection

@section('sale-form')
    @include('blocks.form-div')
@endsection

