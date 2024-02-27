@props(['blogCategories', 'category' => null, 'child' => null, 'child2' => null])

<div class="blog_category">
    <button id="categories_btn">Категории</button>
    <x-blog-search-form />
    <div class="blog_subtitle">Категории</div>
    <ul class="top_list">
        @foreach($blogCategories as $cat)
            <li @class(['top_level', 'openable', 'active' => isset($category) && $cat->id === $category->id])>
                {{db_translate($cat->name, $cat->name_kz)}}
                <ul @class(['hide' => !isset($category) || $cat->id !== $category->id])>
                    @foreach($cat->childs as $c)
                        <li @class(['active' => isset($child) && $c->id === $child->id && !isset($child2),
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