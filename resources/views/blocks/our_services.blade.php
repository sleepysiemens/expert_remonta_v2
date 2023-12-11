<section class="services">
    <h1 class="section-header hidden">Наши услуги</h1>

    <div class="main-services">

        @php
            $i=0;
        @endphp

        @foreach ($services as $service)
        @php
            $i++;
        @endphp
        <span class="service-banner scroll-hidden">
            <a class="service-banner-link" href="{{ route('uslugi.index') }}/{{$service->url}}/">
                <img src=" /img/services/{{$service->src}}">
            </a>
            <a href="{{ route('service.index', $service->url) }}" class="service-content">
                <h4>{{$service->title}}</h4>
            </a>
            <a href="{{ route('uslugi.index') }}/{{$service->url}}/" class="service-banner-button"><p>Подробнее</p></a>
        </span>
        @if ($i==4)
            @break
        @endif
        @endforeach

    </div>
    <div class="services-link-div">
        <a class="services-link hidden" href="{{ route('uslugi.index') }}/">Смотреть все</a>
    </div>
</section>