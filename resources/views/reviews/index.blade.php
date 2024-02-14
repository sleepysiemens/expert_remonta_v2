@extends('Layouts.wrapper')
@section('content')


@include('blocks.reviews-page')

@endsection

@section('reviews')
nav-link-selected
@endsection

@section('meta-description')
    {{db_translate($seo->meta_ru, $seo->meta_kz)}}
@endsection

@section('seo-title')
    {{db_translate($seo->seo_ru, $seo->seo_kz)}}
@endsection
