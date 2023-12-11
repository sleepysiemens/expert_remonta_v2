<section class="why">
    <h1 class="section-header">Почему мы?</h1>
    <div class="why-div">

        @foreach ($WhyCards as $card)

        <span class="why-banner hidden">
            <img src=" /img/icons/{{$card->src}}">
            <h4>{{$card->title}}</h4>
            <p>{{$card->subtitle}}</p>
        </span>
        
        @endforeach
       
    </div>
</section>