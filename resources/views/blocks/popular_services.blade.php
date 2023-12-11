<section class="services">
    <h1 class="section-header hidden">Популярные услуги</h1>

    <div class="popular-div">

        @foreach ($popular_services as $popular_service)

        <a href="{{ route('uslugi.index').'/'.$popular_service->url }}" class="popular-element">
            <div class="popular-element-container">
                <img class="popular-element-cover" src="/img/blog/{{$popular_service->src}}">
                <div class="popular-element-text">
                    <h4>{{$popular_service->title}}</h4>
                    <p>{{$popular_service->description}}</p>
                </div>
            </div>
        </a>

        @endforeach

    </div>
</section>