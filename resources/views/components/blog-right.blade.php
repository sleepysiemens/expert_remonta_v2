@props(['posts', 'post' => null])

<div class="blog_posts">
    @if(count($posts) > 0)
    <x-blog-search-form />
    <div class="blog_subtitle">Статьи</div>
    @endif
    <ul>
    @foreach($posts as $p)
        <li @class(['active' => $post && $post->url === $p->url])>
            @if($p->category->parent->parent)
            <a href="{{route('blog.postDeep', $p->genRouteParams())}}">
                @if($post && $post->url === $p->url)▶@endif 
                {{db_translate($p->short_title_ru, $p->short_title_kz)}}
            </a>
            @else 
            <a href="{{route('blog.post', $p->genRouteParams())}}">
                @if($post && $post->url === $p->url)▶@endif 
                {{db_translate($p->short_title_ru, $p->short_title_kz)}}
                </a>
            @endif
        </li>
    @endForeach
    </ul>
    
</div>
</div>