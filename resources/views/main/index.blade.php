@extends('Layouts.wrapper')

@section('content')

@include('blocks.welcome')
@include('blocks.text_company')
@include('blocks.about_company')
@include('blocks.our_services')
@include('blocks.why')
@include('blocks.faq')
@include('blocks.sales')
@include('blocks.form')


@endsection

@section('main')
nav-link-selected
@endsection

@section('sale-form')
    @include('blocks.sale_form')
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
