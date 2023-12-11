@extends('Layouts.wrapper')
@section('content')

@section('page_title')
Прайс расценки на ремонт и строительство в Астане
@endsection

@include('blocks.prices')
@include('blocks.form')

@endsection

@section('price')
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