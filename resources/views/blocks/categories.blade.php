<section class="services-page">
    <h1 class="section-header">Категории</h1>
    <br>
    <div class="services-div">

        @foreach ($categories as $category)

        <span class="service-banner">
            <a class="service-banner-link" href="{{ route('category.index', [$category->service_url, $category->url]) }}">
                <img src=" /img/categories/{{$category->src}}">
            </a>
            <a href="{{ route('category.index', [$category->service_url, $category->url]) }}" class="category-content">
                <h4>{{ $category->title }}</h4>
            </a>
            <a class="service-banner-button" href="{{ route('category.index', [$category->service_url, $category->url]) }}"><p>Подробнее</p></a>
        </span>
            
        @endforeach

    </div>
</section>