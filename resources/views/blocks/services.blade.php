<section class="services-page">
    <h1 class="section-header">Услуги</h1>
    <br>
    <div class="services-div">

        @foreach ($services as $service)

        <span class="service-banner">
            <a class="service-banner-link" href="{{ route('service.index', $service->url) }}">
                <img src=" /img/services/{{$service->src}}">
            </a>
            <a href="{{ route('service.index', $service->url) }}" class="service-content">
                <h4>{{ $service->title }}</h4>
            </a>
            <a class="service-banner-button" href="{{ route('service.index', $service->url) }}"><p>Подробнее</p></a>
        </span>
            
        @endforeach

    </div>
</section>