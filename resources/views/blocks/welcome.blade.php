<section class="welcome">
  @foreach ($Headers as $Header)
            <img class="welcome-bg" src="{{$Header->src}}">
  @endforeach
            <div class="welcome-content">
                <div class="welcome-header hidden">
                    @foreach ($Headers as $Header)
                    <h1>{{$Header->title}}</h1>
                    <h3>{{$Header->subtitle}}</h3>
                    @endforeach
                </div>
                <div class="welcome-cards">
                    @php
                        $i=1;
                    @endphp
                    @foreach ($WelcomeCards as $card)
                        <span class="welcome-card welcome-card-{{$i++}} scroll-hidden">
                            <p>{{$card->title}}</p>
                            <img src=" /img/cards/{{$card->src}}">
                        </span>
                    @endforeach
                </div>
            </div>
        </section>