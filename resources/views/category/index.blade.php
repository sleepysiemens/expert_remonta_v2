@extends('Layouts.wrapper')
@php

@endphp
@section('service')
nav-link-selected
@endsection


        @section('content')
            @include('blocks.welcome-category')
            @include('blocks.about_category')
            @include('blocks.why_new')
            @include('blocks.reviews_new')
        @endsection


@section('meta-description')
        {{db_translate($category->meta_desc_ru, $category->meta_desc_kz)}}
@endsection

@section('seo-title')
        {{db_translate(processTitle($category->seo_title_ru, env('APP_CITY')), $category->seo_title_kz)}}
@endsection

@section('sale-form')
    @include('blocks.form-div')
@endsection

