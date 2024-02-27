@extends('Layouts.wrapper')

@section('blog')
nav-link-selected
@endsection


        @section('wrapClass')blog @endSection

        @section('content')
            <div id="blog">
                <div class="blog_title">Блог</div>
                @if(!$post->active)
                    <p>Это архивная страница. Вы видите её, потому что залогинены в админку.
                        Гости не видят этой страницы.
                    </p>
                @endif
                <div class="blog_flex">
                    <x-blog-categories 
                    :blogCategories="$blogCategories" 
                    :category="$category"
                    :child="$child"
                    :child2="isset($child2) ? $child2 : null"
                />
                    <div class="blog_content">
                        <div class="blog_breadcrumbs">
                            <a href="{{route('blog.category', $category->url)}}">{{$category->name}}</a> > 
                            <a href="{{route('blog.category', [$category->url, $child->url])}}">{{$child->name}} </a> >
                            @if(isset($child2))
                            <a href="{{route('blog.category', [$category->url, $child->url, $child2->url])}}">{{$child2->name}} </a> >
                            @endif
                            {{db_translate($post->short_title_ru, $post->short_title_kz)}}
                        </div>
                        <img class="blog_thumb" 
                        src="/img/blog/{{$post->src}}" 
                        alt="{{$post->title_ru}}">
                        <h1>{{db_translate($post->title_ru, $post->title_kz)}}</h1>
                        <article class="post_body">
                            {!!db_translate($post->description_ru, $post->description_kz)!!}
                        </article>
                        @if(auth()->user() && auth()->user()->role === 'admin')
                        <div class="blog_subtitle">Была ли эта статья полезна?</div>
                        
                        <form action="{{route('admin.blog.wish', $post->id)}}" method="POST"
                            id="grade_form">
                            @csrf @method('patch')
                            <input type="radio" id="radio_yes" name="grade" value="1" 
                            @checked($post->grade) />
                            <label class="radio_label" for="radio_yes">Да</label>
                            <input type="radio" id="radio_no" name="grade" value="0"
                            @checked(!$post->grade) />
                            <label class="radio_label" for="radio_no">Нет</label>
                            <br> <br>
                            <div class="form_hide">
                            <textarea name="wishes" id="" rows="7" 
                            placeholder="Поделитесь своим мнением об этой статье">{{$post->wishes}}</textarea>
                            <button class="ui_kit_button">Отправить</button>
                            </div>
                        </form>
                        @endif
                     
                        <div style="margin-top:40px">
                            <hr>
                        <div class="posts_nav">
                            
                            @if($prevPost)
                                @if(!isset($child2))
                              <a href="{{route('blog.post', [$category->url, $child->url, $prevPost->url])}}">
                                < {{db_translate($prevPost->short_title_ru, $prevPost->short_title_kz)}}
                                </a>
                                @else
                                <a href="{{route('blog.postDeep', [$category->url, $child->url, $child2->url, $prevPost->url])}}">
                                    < {{db_translate($prevPost->short_title_ru, $prevPost->short_title_kz)}}
                                    </a>
                                @endif
                            @endif
                            @if($nextPost)
                            @if(!isset($child2))
                              <a href="{{route('blog.post', [$category->url, $child->url, $nextPost->url])}}">
                                {{db_translate($nextPost->short_title_ru, $nextPost->short_title_kz)}} >
                                </a>
                                @else
                                <a href="{{route('blog.postDeep', [$category->url, $child->url, $child2->url, $nextPost->url])}}">
                                    {{db_translate($nextPost->short_title_ru, $nextPost->short_title_kz)}} >
                                    </a>
                                @endif
                            @endif
                        </div>
                        </div>
                    </div>
                    <x-blog-right :posts="$posts" :post="$post" />
                </div>
            

    @endsection

@section('meta-description'){{db_translate($post->meta_desc_ru, $post->meta_desc_kz)}}@endsection

@section('seo-title'){{db_translate($post->seo_title_ru, $post->seo_title_kz)}}@endsection

@push('customScripts')
    <script defer src="/js/blog.js"></script>
@endPush

