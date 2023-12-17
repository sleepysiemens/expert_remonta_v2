<section class="services-page">
    <h1 class="section-header">Галерея</h1>
    <br>
    <div class="services-div" style="min-height: 120vh">
        @php
            $i=0;
        @endphp

        @foreach($galleries as $gallery)

        @php
            $i++;
        @endphp

        <span class="service-banner" id="item_{{$i}}">
            <a class="close_{{$i}} close"><i class="fas fa-times"></i></a>
            <a class="service-banner-link item_{{$i}}">
                <img alt="{{app()->db_translate($gallery->title_ru, $gallery->title_kz)}}" src=" /img/gallery/{{$gallery->src}}">
            </a>
        </span>

        @endforeach

    </div>
</section>

<script>
    for(let i=1; i<={{$i}};i++)
    {
        $('.item_'+i).on('click', function()
        {
            $('#item_'+i).addClass('fullscreen');
            $('.item_'+i).addClass('close_'+i);
            $('.item_'+i).removeClass('item_'+i);
        });

        $('.close_'+i).on('click', function()
        {
            $('#item_'+i).removeClass('fullscreen');
            $('.close_'+i).addClass('item_'+i);
            $('.close_'+i).removeClass('close_'+i);
        });
    }
</script>
