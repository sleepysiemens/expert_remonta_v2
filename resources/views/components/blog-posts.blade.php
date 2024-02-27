@props(['posts'])

<div class="blog_content">
    @foreach($posts as $post)
    <div class="blog_post_card">
    <img class="blog_thumb" src="/img/blog/{{$post->src}}" alt="{{$post->title_ru}}">
    <div>
    <div class="blog_breadcrumbs">
        @if($post->category->parent->parent)
        <a href="{{route('blog.category', $post->category->parent->parent->url)}}">
            {{$post->category->parent->parent->name}}</a> > 
        @endif
        @if($post->category->parent)
        <a href="{{route('blog.category', $post->genCategoryRouteParams(false))}}">
            {{$post->category->parent->name}} 
        </a> >
        @endif

        <a href="{{route('blog.category', $post->genCategoryRouteParams(true))}}">
            {{$post->category->name}} 
        </a>

    </div>
    
    <h2>{{db_translate($post->title_ru, $post->title_kz)}}</h2>
    <article class="post_body">
        {{$post->short}}
    </article>
    @if($post->category->parent->parent)
    <a class="readmore" href="{{route('blog.postDeep', $post->genRouteParams())}}">
        Читать полностью
    </a>
    @else
    <a class="readmore" href="{{route('blog.post', $post->genRouteParams())}}">
        Читать полностью
    </a>
    @endif
    </div>
    </div>
    @endForeach

    {{ $posts->links('vendor.pagination.default') }}

</div>