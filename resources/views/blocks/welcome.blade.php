<section class="welcome">
  @foreach ($Headers as $Header)
            {{--<img class="welcome-bg" src="/img/main_bg/{{$Header->src}}" @if($Header->blur==1) style="filter: blur(4px);" @endif>--}}
            <img class="welcome-bg" 
            src="{{getCommonResource("/img/main_bg/".$Header->src)}}" 
            srcset="{{getCommonResource('/img/main_bg/x-768-' . str_replace('.png', '.jpg', $Header->src))}} 1199w,
            {{getCommonResource("/img/main_bg/".$Header->src)}} 1200w
            "
            alt="{{"Эксперт Ремонта " . env('APP_CITY') . " - эксперты в ремонте квартир"}}"
            @if($Header->blur==1) style="filter: blur(4px);" @endif
            >
  @endforeach
            <div class="welcome-content">
                <div class="welcome-header hidden">
                    @foreach ($Headers as $Header)
                    <h1>{{app()->db_translate($Header->title_ru,$Header->title_kz)}}</h1>
                    <h3>{{app()->db_translate($Header->subtitle_ru,$Header->subtitle_kz)}}</h3>
                    @endforeach
                </div>
                <div class="welcome-cards">
                    @php
                        $i=1;
                    @endphp
                    @foreach ($WelcomeCards as $card)
                        <span class="welcome-card welcome-card-{{$i++}} scroll-hidden">
                            <p>{{app()->db_translate($card->title_ru,$card->title_kz)}}</p>
                            {{--<img src="/img/cards/{{$card->src}}">--}}
                            <img src="{{getCommonResource("/img/cards/".$card->src)}}">
                        </span>
                    @endforeach
                </div>
            </div>
        </section>
