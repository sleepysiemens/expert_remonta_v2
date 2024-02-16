<section class="about">
    @foreach ($Abouts as $About)
        <div class="about-text">
                <h1 class="hidden">{{__('О нас')}}</h1>
                <p class="hidden">
                    {{db_translate($About->title_ru,$About->title_kz)}}
                </p>
        </div>
            <div class="about-img hidden">
                <img src=" /img/about/{{$About->src}}" alt="Компания Эксперт Ремонта">
            </div>
    @endforeach
        </section>
