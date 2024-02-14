<section class="why">
    <div class="section-header">{{__("Почему мы?")}}</div>
    <div class="why-div">
        @php
            $why_cnt=1;
        @endphp
        
        <div class="why_block">
        <div class="why_flex">
            {{--<div class="why_item hidden">Технические <br> и дизайнерские решения</div>
            <div class="why_item hidden">Индивидуальный <br> подход к клиенту</div>--}}
            @foreach($WhyCards as $card)
                @if($loop->iteration <= 2)
                <div class="why_item hidden">
                    {{db_translate($card->title_ru, $card->title_kz)}}
                </div>
                @endif
            @endforeach
        </div>
        </div>

        <div class="why_block">
        <div class="why_flex">
            {{--<div class="why_item hidden">Профессиональные <br> исполнители</div>
            <div class="why_item hidden">Придаем каждому обьекту <br> идеальный вид</div>--}}
            @foreach($WhyCards as $card)
            @if($loop->iteration >= 3 && $loop->iteration < 5)
                <div class="why_item hidden">
                    {{db_translate($card->title_ru, $card->title_kz)}}
                </div>
            @endif
            @endforeach
        </div>
        </div>

    </div>
</section>
