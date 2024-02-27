@extends('Layouts.wrapper')

@section('blog')
nav-link-selected
@endsection

        @section('wrapClass')blog @endSection

        @section('content')
            <div id="blog">
                <div class="blog_title">Блог</div>
                @if(isset($q))
                    <p>Результаты поиска по запросу {{$q}}</p>
                    @if(count($posts) === 0)
                    <p>Ничего не найдено, попробуйте другой поисковый запрос</p>
                    <x-blog-search-form />
                    @endif
                @endif
                <div class="blog_flex">
                    <x-blog-categories :blogCategories="$blogCategories"/>
                    <x-blog-posts :posts="$posts"/>
                    <x-blog-right :posts="$posts"/>
            </div>
            {{--</div>--}}

    @endsection

@if($seo)
@section('seo-title'){{db_translate($seo->seo_ru, $seo->seo_kz)}}@endsection
@section('meta-description'){{db_translate($seo->meta_ru, $seo->meta_kz)}}@endsection
@endif

@push('customScripts')
    <script defer src="/js/blog.js"></script>
@endPush

