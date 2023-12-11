@extends('Layouts.wrapper')

@section('page_title')
Фото выполненных работ – Эксперт Ремонта
@endsection

@section('content')
@include('blocks.gallery')

@endsection

@section('gallery')
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
