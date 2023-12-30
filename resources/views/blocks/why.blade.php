<section class="why">
    <h1 class="section-header">Почему мы?</h1>
    <div class="why-div">
        @php
            $why_cnt=1;
        @endphp
        @foreach ($WhyCards as $card)

        <span class="why-banner hidden">
            <span class="why-banner-number">{{$why_cnt}}</span>
            <h4>{{app()->db_translate($card->title_ru, $card->title_kz)}}</h4>
            <p>{{app()->db_translate($card->subtitle_ru, $card->subtitle_kz)}}</p>
        </span>
            @php
                $why_cnt++;
            @endphp
        @endforeach

    </div>
</section>
