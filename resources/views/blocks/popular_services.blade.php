<section class="services">
    <h1 class="section-header hidden">{{__('Популярные услуги')}}</h1>

    <div class="services-div">
        @php         dd(event('postHasViewed', $post))
        @endphp

            {{--@foreach ($popular_services as $popular_service)

            <a href="{{ route('uslugi.index').'/'.$popular_service->url }}" class="popular-element">
                <div class="popular-element-container">
                    <img class="popular-element-cover" src="/img/blog/{{$popular_service->src}}">
                    <div class="popular-element-text">
                        <h4>{{db_translate($popular_service->title_ru,$popular_service->title_kz)}}</h4>
                        <p>{{db_translate($popular_service->description_ru,$popular_service->description_kz)}}</p>
                    </div>
                </div>
            </a>

            @endforeach--}}

    </div>
</section>
