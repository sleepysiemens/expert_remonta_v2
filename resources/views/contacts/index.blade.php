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
  {{app()->db_translate($seo->meta_ru, $seo->meta_kz)}}
@endsection

@section('seo-title')
  {{app()->db_translate($seo->seo_ru, $seo->seo_kz)}}
@endsection
