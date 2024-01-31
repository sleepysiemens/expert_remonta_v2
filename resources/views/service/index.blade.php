@extends('Layouts.wrapper')



        @section('page_title')
        {{$service->title}} – Эксперт Ремонта
        @endsection
        @section('content')
            @include('blocks.path-service')
            @include('blocks.about_service')
            @include('blocks.categories')
            {{--@include('blocks.reviews_new')--}}
        @endsection



@section('service')
nav-link-selected
@endsection


@section('meta-description')
        {{app()->db_translate($service->meta_desc_ru, $service->meta_desc_kz)}}
@endsection

@section('seo-title')
        {{app()->db_translate($service->seo_title_ru, $service->seo_title_kz)}}
@endsection
