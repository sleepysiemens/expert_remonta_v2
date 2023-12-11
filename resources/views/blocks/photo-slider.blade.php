<section class="photo-slider">
    <div class="slider-tools">
        <button class="left" id="slider-left"><i class="fas fa-caret-left"></i></button>
        @php
        $i=1;
        @endphp

        @foreach ($CategoryImages as $CategoryImage)
            @if ($i==1)
                <button class="circle-button circle-button-active" id="btn-{{$i}}"></button>
            @else
            <button class="circle-button" id="btn-{{$i}}"></button>

            @endif

            @php
                $i++;
            @endphp
        @endforeach
        @php
            $max_i=$i-1;
            $i=1;
        @endphp
        <button class="right" id="slider-right"><i class="fas fa-caret-right"></i></button>
    </div>

    @foreach ($CategoryImages as $CategoryImage)
        @if ($i==1)
            <div class="photo photo-main" id="photo-{{$i}}">
                <img src=" /img/category_slider/{{$category->id}}/{{$CategoryImage->src}}">
            </div>
        @else
            @if ($i==2)
            <div class="photo photo-right" id="photo-{{$i}}">
                <img src=" /img/category_slider/{{$category->id}}/{{$CategoryImage->src}}">
            </div>
            @else
                @if ($i==$max_i)
                    <div class="photo photo-left" id="photo-{{$i}}">
                        <img src=" /img/category_slider/{{$category->id}}/{{$CategoryImage->src}}">
                    </div>
                @else
                <div class="photo" id="photo-{{$i}}">
                    <img src=" /img/category_slider/{{$category->id}}/{{$CategoryImage->src}}">
                </div>
                @endif
            @endif
        @endif



        @php
            $i++;
        @endphp

    @endforeach
</section>

<script>
const max={{$max_i}};
let cnt=1;

$('#slider-right').on('click', function() 
{
    cnt++;

    $('.photo-left').removeClass('photo-left');
    $('.photo-right').removeClass('photo-right');
    $('.photo-main').removeClass('photo-main');

    if(cnt>max)
    {
        cnt=1;

        $('#photo-1').addClass('photo-main');
        $('#photo-2').addClass('photo-right');
        $('#photo-'+max).addClass('photo-left');
    }
    else
    {
        if(cnt==max)
        {
            $('#photo-'+cnt).addClass('photo-main');
            $('#photo-'+(cnt-1)).addClass('photo-left');
            $('#photo-1').addClass('photo-right');
        }
        else
        {
            $('#photo-'+cnt).addClass('photo-main');
            $('#photo-'+(cnt-1)).addClass('photo-left');
            $('#photo-'+(cnt+1)).addClass('photo-right');
        }
    }
    $('.circle-button-active').removeClass('circle-button-active');
    $('#btn-'+cnt).addClass('circle-button-active');
});

$('#slider-left').on('click', function() 
{
    cnt--;

    $('.photo-left').removeClass('photo-left');
    $('.photo-right').removeClass('photo-right');
    $('.photo-main').removeClass('photo-main');

    if(cnt<1)
    {
        $('.photo-left').removeClass('photo-left');
        $('.photo-right').removeClass('photo-right');
        $('.photo-main').removeClass('photo-main');

        cnt=max;

        $('#photo-'+max).addClass('photo-main');
        $('#photo-1').addClass('photo-right');
        $('#photo-'+(max-1)).addClass('photo-left');
    }
    else
    {
        if(cnt==1)
        {
            $('#photo-1').addClass('photo-main');
            $('#photo-'+(max)).addClass('photo-left');
            $('#photo-'+(cnt+1)).addClass('photo-right');
        }
        else
        {
            $('#photo-'+cnt).addClass('photo-main');
            $('#photo-'+(cnt-1)).addClass('photo-left');
            $('#photo-'+(cnt+1)).addClass('photo-right');
        }
    }

    $('.circle-button-active').removeClass('circle-button-active');
    $('#btn-'+cnt).addClass('circle-button-active');
});

for(let i=1; i<=max; i++)
{
    $('#btn-'+i).on('click', function()
    {
        cnt=i;
        $('.circle-button-active').removeClass('circle-button-active');
        $('#btn-'+i).addClass('circle-button-active');

        $('.photo-left').removeClass('photo-left');
        $('.photo-right').removeClass('photo-right');
        $('.photo-main').removeClass('photo-main');

        if(cnt==1)
        {
            $('#photo-'+i).addClass('photo-main');
            $('#photo-'+(max)).addClass('photo-left');
            $('#photo-'+(i+1)).addClass('photo-right');
        }
        else
        {
            if(cnt==max)
            {
                $('#photo-'+i).addClass('photo-main');
                $('#photo-'+(i-1)).addClass('photo-left');
                $('#photo-'+(1)).addClass('photo-right');
            }
            else
            {
                $('#photo-'+i).addClass('photo-main');
                $('#photo-'+(i-1)).addClass('photo-left');
                $('#photo-'+(i+1)).addClass('photo-right');
            }
        }
        
    });
};
</script>