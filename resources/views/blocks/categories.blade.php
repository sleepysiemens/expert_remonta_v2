<section class="services-page">
    <h1 class="section-header">{{app()->translate('Категории')}}</h1>
    <br>
    <div class="services-div">

        @foreach ($categories as $category)

        <span class="service-banner">
            <a class="service-banner-link" href="{{ route('category.index', [$category->service->url, $category->url]) }}">
                <img src=" /img/categories/{{$category->src}}">
            </a>
            <a href="{{ route('category.index', [$category->service->url, $category->url]) }}" class="category-content">
                <h4>{{app()->db_translate($category->title_ru, $category->title_kz)}}</h4>
            </a>
            <a class="service-banner-button" href="{{ route('category.index', [$category->service->url, $category->url]) }}"><p>{{app()->translate('Подробнее')}}</p></a>
        </span>

        @endforeach

    </div>
</section>
