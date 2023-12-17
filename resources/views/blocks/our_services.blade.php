<section class="services">
    <h1 class="section-header hidden">{{app()->translate('Наши услуги')}}</h1>

    <div class="review-wrapper">
        <div class="reviews-div" style="height: auto">

            @php
                $i=0;
            @endphp

            @foreach ($services as $service)
            @php
                $i++;
            @endphp
            <span class="service-banner scroll-hidden" style="margin: 0 5px">
                <a class="service-banner-link" href="{{ route('uslugi.index') }}/{{$service->url}}/">
                    <img src=" /img/services/{{$service->src}}">
                </a>
                <a href="{{ route('service.index', $service->url) }}" class="service-content">
                    <h4>{{app()->db_translate($service->title_ru, $service->title_kz)}}</h4>
                </a>
                <a href="{{ route('uslugi.index') }}/{{$service->url}}/" class="service-banner-button"><p>{{app()->translate('Подробнее')}}</p></a>
            </span>
            @if ($i==4)
                @break
            @endif
            @endforeach

        </div>
    </div>
    <div class="services-link-div">
        <a class="services-link hidden" href="{{ route('uslugi.index') }}/">{{app()->translate('Смотреть все')}}</a>
    </div>
</section>
