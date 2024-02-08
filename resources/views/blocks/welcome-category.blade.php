<section class="welcome welcome-slider">
    @php $cnt=0; @endphp
        @foreach ($CategoryImages as $CategoryImage)
            @php $cnt++; @endphp
            <img class="welcome-bg @if($cnt==1) slide-active @endif" id="slide_{{$cnt}}" src="/img/category_slider/{{$CategoryImage->category_id}}/{{$CategoryImage->src}}"
            alt="{{$CategoryImage->alt}}"
            srcset="/img/category_slider/{{$CategoryImage->category_id}}/x-768-{{transformCropExtension($CategoryImage->src)}} 1199w,
            /img/category_slider/{{$CategoryImage->category_id}}/{{$CategoryImage->src}} 1200w"
            >
        @endforeach
            <div class="welcome-content">
                <div class="welcome-header hidden">
                    @foreach ($Headers as $Header)
                    <div>{{app()->db_translate($Header->title_ru,$Header->title_kz)}}</div>
                    <div>{{app()->db_translate($Header->subtitle_ru,$Header->subtitle_kz)}}</div>
                    @endforeach
                </div>
                <div class="welcome-cards">
                    @foreach ($WelcomeCards as $card)
                        <span class="welcome-card welcome-card-{{$loop->iteration}} scroll-hidden">
                            <p>{{app()->db_translate($card->title_ru,$card->title_kz)}}</p>
                            <img src=" /img/cards/{{$card->src}}">
                        </span>
                    @endforeach
                </div>
            </div>
</section>

<script>
    let i=1;

    function incr()
    {
        if(i=={{$cnt}})
            i=1;
        else
            i++;
    }

    function next_slide()
    {
        $('#slide_'+i).removeClass('slide-active');
        incr();
        $('#slide_'+i).addClass('slide-active');
        setTimeout(next_slide, 3500);
    }

    setTimeout(next_slide, 3500);
</script>
