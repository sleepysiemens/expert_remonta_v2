@extends('Layouts.wrapper')

@section('blog')
nav-link-selected
@endsection


        {{--@section('page_title')
            {{$blog->title}} – Эксперт Ремонта
        @endsection--}}

        @section('wrapClass')blog @endSection

        @section('content')
            {{--@include('blocks.welcome')--}}
            <div id="blog">
                <div class="blog_title">Блог</div>
                <div class="blog_flex">
                    <div class="blog_category">
                        <button id="categories_btn">Категории</button>
                        <div class="blog_subtitle">Категории</div>
                        <ul class="top_list">
                            @foreach($blogCategories as $cat)
                                <li @class(['top_level', 'openable', 'active' => $cat->id === $category->id])>
                                    {{db_translate($cat->name, $cat->name_kz)}}
                                    <ul @class(['hide' => $cat->id !== $category->id])>
                                        @foreach($cat->childs as $c)
                                            <li @class(['active' => $c->id === $child->id && !isset($child2),
                                            'openable' => count($c->childs) > 0])
                                            >
                                            <a href="{{route('blog.category', [$cat->url, $c->url])}}">
                                            {{db_translate($c->name, $c->name_kz)}}</a>
                                            @if(count($c->childs) > 0)
                                            <ul {{--class="hide"--}}>
                                            @foreach($c->childs as $deepChild)
                                            <li @class(['active' => isset($child2) && $deepChild->id === $child2->id])
                                                >
                                                <a href="{{route('blog.category', [$cat->url, $c->url, $deepChild->url])}}">
                                                {{db_translate($deepChild->name, $deepChild->name_kz)}}</a>
                                            </li>
                                            @endForeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endForeach
                                    </ul>
                                </li>
                            @endForeach
                        </ul>
                    </div>
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
                        <form action="{{route('admin.blog.wish', $post->id)}}" method="POST">
                            @csrf @method('patch')
                            <textarea name="wishes" id="" rows="7" 
                            placeholder="Поделитесь своим мнением об этой статье">{{$post->wishes}}</textarea>
                            <button class="ui_kit_button">Отправить</button>
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
                    <div class="blog_posts">
                        <div class="blog_subtitle">Статьи</div>
                        <ul>
                        @foreach($posts as $p)
                            <li @class(['active' => $post->url === $p->url])>
                                @if(!isset($child2))
                                <a href="{{route('blog.post', [$category->url, $child->url, $p->url])}}">
                                {{db_translate($p->short_title_ru, $p->short_title_kz)}}
                                </a>
                                @else 
                                <a href="{{route('blog.postDeep', [$category->url, $child->url, $child2->url, $p->url])}}">
                                    {{db_translate($p->short_title_ru, $p->short_title_kz)}}
                                    </a>
                                @endif
                            </li>
                        @endForeach
                        </ul>
                        
                    </div>
                </div>
            </div>

    @endsection

@section('meta-description'){{db_translate($post->meta_desc_ru, $post->meta_desc_kz)}}@endsection

@section('seo-title'){{db_translate($post->seo_title_ru, $post->seo_title_kz)}}@endsection

@push('customScripts')
    <script defer src="/js/blog.js"></script>
@endPush

