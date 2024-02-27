@extends('Layouts.wrapper')

@section('blog')
nav-link-selected
@endsection


        @section('page_title')
            Блог
        @endsection

        @section('content')
            
        <section class="services-page">
            <h2 class="section-header">{{__('Блог. Категории')}}</h1>
            <br>
            <div class="services-div categories-div">
        
                @foreach ($blogs as $cat)
        
                <div class="service-banner">
                    <a class="service-banner-link" href="{{ route('blog.category', [$cat->url]) }}">
                        <img src="/img/blog_category/{{$cat->thumb}}">
                    </a>
                    <a href="{{ route('blog.category', [$cat->url]) }}" class="category-content">
                        <h4>{{db_translate($cat->name, $cat->name_kz)}}</h4>
                    </a>
                </div>
        
                @endforeach
        
            </div>
        </section>

    @endsection

{{--@section('meta-description')
    @foreach ($seos as $seo)
        {{db_translate($seo->meta_ru, $seo->meta_kz)}}
    @endforeach
@endsection

@section('seo-title')
    @foreach ($seos as $seo)
        {{db_translate($seo->seo_ru, $seo->seo_kz)}}
    @endforeach
@endsection--}}

