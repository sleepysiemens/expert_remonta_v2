@extends('Layouts.wrapper')


    @foreach ($services as $service)

        @section('page_title')
        {{$service->title}} – Эксперт Ремонта
        @endsection
        @section('content')
            @include('blocks.welcome-service')
            @include('blocks.path-service')
            @include('blocks.about_service')
            @include('blocks.categories')
            @include('blocks.reviews')
            @include('blocks.form')
        @endsection
    @endforeach



@section('service')
nav-link-selected
@endsection


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
