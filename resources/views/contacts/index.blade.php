@extends('Layouts.wrapper')

@section('page_title')
Контакты – Эксперт Ремонта
@endsection

@section('content')
    @include('blocks.welcome-contacts')
    @include('blocks.about_company')
    @include('blocks.reviews')
@endsection

@section('contact')
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
