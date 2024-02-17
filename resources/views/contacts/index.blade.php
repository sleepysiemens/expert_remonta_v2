@extends('Layouts.wrapper')

@section('page_title')
Контакты – Эксперт Ремонта
@endsection

@section('content')
    @include('blocks.welcome-contacts')
    {{--@include('blocks.about_company')--}}
    <section class="about" style="display:block">
    @if(config('app.city') === 'Астана')
    {!!$block->code!!}
    @else
    {!!$block->code_almaty!!}
    @endif
    </section>
    @include('blocks.reviews_new')
@endsection

@section('contact')
    nav-link-selected
@endsection

@section('meta-description')
  {{db_translate($seo->meta_ru, $seo->meta_kz)}}
@endsection

@section('seo-title')
  {{db_translate($seo->seo_ru, $seo->seo_kz)}}
@endsection
