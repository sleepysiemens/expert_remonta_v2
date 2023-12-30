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
        {{app()->db_translate($seo->meta_ru, $seo->meta_kz)}}
    @endforeach
@endsection

@section('seo-title')
    @foreach ($seos as $seo)
        {{app()->db_translate($seo->seo_ru, $seo->seo_kz)}}
    @endforeach
@endsection
