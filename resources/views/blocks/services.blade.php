<section class="services-page">
    <h1 class="section-header">{{__('Услуги')}}</h1>
    <br>
    <div class="services-div">

        @foreach ($services as $service)

        <span class="service-banner">
            <a class="service-banner-link" href="{{ route('service.index', $service->url) }}">
                <img src=" /img/services/{{$service->src}}">
            </a>
            <a href="{{ route('service.index', $service->url) }}" class="service-content">
                <h4>{{ db_translate($service->title_ru,$service->title_kz) }}</h4>
            </a>
            <a class="service-banner-button" href="{{ route('service.index', $service->url) }}"><p>{{__('Подробнее')}}</p></a>
        </span>

        @endforeach
    </div>
</section>
