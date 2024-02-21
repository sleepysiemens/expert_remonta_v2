@extends('Layouts.wrapper')



        @section('page_title')
        {{$category->name}} – Эксперт Ремонта
        @endsection
        @section('content')
            {{--@include('blocks.path-service')--}}
            {{--@include('blocks.about_service')
            
            @include('blocks.categories')--}}
            <section class="path">
                <p><a href="{{ route('main.index') }}/">{{__('Главная')}}</a> /
                 <a href="{{ route('main.index') }}/">{{__('Блог')}}</a> / 
                 <a href="{{ route('blog.category', $parentCategory->url) }}">
                    {{db_translate($parentCategory->name,$parentCategory->name_kz)}}
                </a>
                @if($child)
                / <a href="{{ route('blog.category', [$parentCategory->url, $child->url]) }}">
                    {{db_translate($child->name,$child->name_kz)}}
                </a>
                @endif
                @if($child2)
                / <a href="{{ route('blog.category', [$parentCategory->url, $child->url, $child2->url]) }}">
                    {{db_translate($child2->name,$child2->name_kz)}}
                </a>
                @endif
                </p>
            </section>

            <section class="about-service">
                <h1>@lang('Категория блога:') {{db_translate($category->name, $category->name_kz)}}</h1>
            </section>

            @if(count($category->childs) > 0)
            <section class="services-page">
                <h2 class="section-header">{{__('Вложенные категории')}}</h1>
                <br>
                <div class="services-div categories-div">
            
                    @foreach ($category->childs as $child)
            
                    <div class="service-banner">
                        @if(!$childCategory)
                        <a class="service-banner-link" href="{{ route('blog.category', [$parentCategory->url, $child->url]) }}">
                            <img src=" /img/blog_category/{{$child->thumb}}">
                        </a>
                        <a href="{{ route('blog.category', [$parentCategory->url, $child->url]) }}" class="category-content">
                            <h4>{{db_translate($child->name, $child->name_kz)}}</h4>
                        </a>
                        @else
                        <a class="service-banner-link" href="{{ route('blog.category', [$parentCategory->url, $category->url, $child->url]) }}">
                            <img src=" /img/blog_category/{{$child->thumb}}">
                        </a>
                        <a href="{{ route('blog.category', [$parentCategory->url, $category->url, $child->url]) }}" class="category-content">
                            <h4>{{db_translate($child->name, $child->name_kz)}}</h4>
                        </a>
                        @endif
                    </div>
            
                    @endforeach
            
                </div>
            </section>
            @endif

            @if(count($category->posts) > 0)
            <section class="services-page">
                <h2 class="section-header">{{__('Статьи')}}</h1>
                <br>
                <div class="services-div categories-div">
            
                    @foreach ($category->posts as $post)
            
                    <div class="service-banner">
                        <a class="service-banner-link" href="{{ route('blog.post', $post->genRouteParams()) }}">
                            <img src=" /img/blog/{{$post->src}}">
                        </a>
                        <a href="{{ route('blog.post', $post->genRouteParams()) }}" class="category-content">
                            <h4>{{db_translate($post->title_ru, $post->title_kz)}}</h4>
                        </a>
                    </div>
            
                    @endforeach
            
                </div>
            </section>
            @endif
            
            

        @endsection



@section('blog')
nav-link-selected
@endsection


@section('meta-description')
        {{db_translate($category->meta_desc_ru, $category->meta_desc_kz)}}
@endsection

@section('seo-title')
        {{db_translate($category->seo_title_ru, $category->seo_title_kz)}}
@endsection
