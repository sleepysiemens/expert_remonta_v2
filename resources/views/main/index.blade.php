@extends('Layouts.wrapper')

@section('content')

@include('blocks.welcome')
@include('blocks.text_company')
@include('blocks.about_company')
@include('blocks.our_services')
@include('blocks.why_new')
@include('blocks.faq')
{{--@include('blocks.sales')--}}
@include('blocks.sales_new')


@endsection

@section('main')
nav-link-selected
@endsection

@section('sale-form')
    @include('blocks.sale_form')
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

