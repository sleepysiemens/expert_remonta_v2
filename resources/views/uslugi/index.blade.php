@extends('Layouts.wrapper')

@section('page_title')
Услуги – Эксперт Ремонта
@endsection

@section('content')

@include('blocks.welcome')
@include('blocks.path')
@include('blocks.services')
@include('blocks.reviews')    
@include('blocks.form')


@endsection

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