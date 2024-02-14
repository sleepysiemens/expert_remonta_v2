@extends('Layouts.wrapper')
@section('content')

@include('blocks.prices')

@endsection

@section('price')
nav-link-selected
@endsection

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
