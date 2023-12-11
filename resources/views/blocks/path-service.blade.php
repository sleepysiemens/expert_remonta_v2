<section class="path">
    <p><a href="{{ route('main.index') }}/">Главная</a> / <a href="{{ route('uslugi.index') }}/">Услуги</a> / <a href="{{ route('service.index', $service->url) }}">{{$service->title}}</a></p>
</section>