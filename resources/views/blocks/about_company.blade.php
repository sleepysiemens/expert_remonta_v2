<section class="about">
    @foreach ($Abouts as $About)
        <div class="about-text">
                <h1 class="hidden">О нас</h1>
                <p class="hidden">
                  @php
                  echo $About->title;
                  @endphp
                </p>
        </div>
            <div class="about-img hidden">
                <img src=" /img/about/{{$About->src}} ">
            </div>
    @endforeach
        </section>