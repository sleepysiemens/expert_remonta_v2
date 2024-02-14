<section class="path">
    <p>
        <a href="{{ route('main.index') }}/">{{__('Главная')}}</a> /
        <a href="{{ route('uslugi.index') }}/">{{__('Услуги')}}</a> /
        <a href="{{ route('service.index', $category->service_url) }}">{{db_translate($category->service_title_ru, $category->service_title_kz)}}</a> /
        <a href="{{ route('category.index', [$category->service_url, $category->url]) }}">{{db_translate($category->title_ru, $category->title_kz)}}</a>
    </p>
</section>
