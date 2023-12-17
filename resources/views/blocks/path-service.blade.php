<section class="path">
    <p><a href="{{ route('main.index') }}/">{{app()->translate('Главная')}}</a> / <a href="{{ route('uslugi.index') }}/">{{app()->translate('Услуги')}}</a> / <a href="{{ route('service.index', $service->url) }}">{{app()->db_translate($service->title_ru,$service->title_kz)}}</a></p>
</section>
