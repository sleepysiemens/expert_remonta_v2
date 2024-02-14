<section class="path">
    <p><a href="{{ route('main.index') }}/">{{__('Главная')}}</a> / <a href="{{ route('uslugi.index') }}/">{{__('Услуги')}}</a> / <a href="{{ route('service.index', $service->url) }}">{{db_translate($service->title_ru,$service->title_kz)}}</a></p>
</section>
