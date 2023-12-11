<section class="path">
    <p>
        <a href="{{ route('main.index') }}/">Главная</a> / 
        <a href="{{ route('uslugi.index') }}/">Услуги</a> / 
        <a href="{{ route('service.index', $category->service_url) }}">{{$category->service_title}}</a> / 
        <a href="{{ route('category.index', [$category->service_url, $category->url]) }}">{{$category->title}}</a>
    </p>
</section>