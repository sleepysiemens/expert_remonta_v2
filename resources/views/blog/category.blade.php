@extends('Layouts.wrapper')

@section('blog')
nav-link-selected
@endsection

@section('seo-title')
        {{db_translate($category->seo_title_ru, $category->seo_title_kz)}}
@endsection

@section('meta-description')
        {{db_translate($category->meta_desc_ru, $category->meta_desc_kz)}}
@endsection


        @section('content')

        <div id="blog">
            <h1 class="blog_title">@lang('Категория блога:') {{db_translate($category->name, $category->name_kz)}}</h1>
            <div class="blog_flex">
                <x-blog-categories 
                    :blogCategories="$blogCategories" 
                    :category="$parentCategory"
                    :child="$child"
                    :child2="$child2"
                />
                <x-blog-posts :posts="$posts"/>
                <x-blog-right :posts="$posts"/>
        </div>
        {{--</div>--}}
            
            

        @endsection

        @push('customScripts')
    <script defer src="/js/blog.js"></script>
@endPush




