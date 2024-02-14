<section class="services-page">
    <h1 class="section-header">{{__('Категории')}}</h1>
    <br>
    <div class="services-div categories-div">

        @foreach ($categories as $category)

        <div class="service-banner">
            <a class="service-banner-link" href="{{ route('category.index', [$category->service->url, $category->url]) }}">
                <img src=" /img/categories/{{$category->src}}">
            </a>
            <a href="{{ route('category.index', [$category->service->url, $category->url]) }}" class="category-content">
                <h4>{{db_translate($category->title_ru, $category->title_kz)}}</h4>
            </a>
        </div>

        @endforeach

    </div>
</section>
