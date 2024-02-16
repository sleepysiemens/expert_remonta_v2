<section class="services">
    <h1 class="section-header hidden">{{__('Наши услуги')}}</h1>

    <div class="services-div">

            @foreach ($homeServices as $service)
            <span class="service-banner scroll-hidden">
                <a class="service-banner-link" href="{{ route('uslugi.index') }}/{{$service->url}}/">
                    <img src=" /img/services/{{$service->src}}"
                    alt="{{db_translate($service->title_ru, $service->title_kz)}}">
                </a>
                <a href="{{ route('service.index', $service->url) }}" class="service-content">
                    <h4>{{db_translate($service->title_ru, $service->title_kz)}}</h4>
                </a>
                <a href="{{ route('uslugi.index') }}/{{$service->url}}/" class="service-banner-button"><p>{{__('Подробнее')}}</p></a>
            </span>
            @if ($loop->iteration==4)
                @break
            @endif
            @endforeach

          </div>
    <div class="services-link-div">
        <a class="services-link hidden" href="{{ route('uslugi.index') }}/">{{__('Смотреть все')}}</a>
    </div>
</section>
