<section class="welcome">
    {{--
    @php $cnt=0; @endphp
    @foreach ($ServiceImages as $serviceImage)
        @php $cnt++; @endphp
        <img class="welcome-bg @if($cnt==1) slide-active @endif" id="slide_{{$cnt}}" src="/img/services/{{$serviceImage->src}}">
    @endforeach
    --}}
    <img class="welcome-bg"  src="/img/services/{{$service->src}}">

            <div class="welcome-content">
                <div class="welcome-header hidden">
                    @foreach ($Headers as $Header)
                        <h1>{{db_translate($Header->title_ru,$Header->title_kz)}}</h1>
                        <h3>{{db_translate($Header->subtitle_ru,$Header->subtitle_kz)}}</h3>
                    @endforeach
                </div>
                <div class="welcome-cards">
                    @php
                        $i=1;
                    @endphp
                    @foreach ($WelcomeCards as $card)
                        <span class="welcome-card welcome-card-{{$i++}} scroll-hidden">
                            <p>{{db_translate($Header->title_ru,$Header->title_kz)}}</p>
                            <img src=" /img/cards/{{$card->src}}">
                        </span>
                    @endforeach
                </div>
            </div>
        </section>
{{--
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
</script>--}}
