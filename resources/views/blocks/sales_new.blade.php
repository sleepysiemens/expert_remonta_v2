
<section class="sales">
    <h1 class="section-header hidden" style="margin-bottom:40px">
        {{__('Специальные предложения')}}
    </h1>
    <div class="sales-wrapper">
        <div class="sales-div">

            @php
                $i=0;
            @endphp

            @foreach ($sales as $sale)
            @php
                $i++;
            @endphp
                @php
                    $end_date[$i]=Cookie::get('sale_'.$sale->id, date("Y-m-d", strtotime('+ '.$sale->period.' days')));
                @endphp

                @php
                if(!isset($_COOKIE['sale_'.$i]))
                    {
                        setcookie('sale_'.$i, date("Y-m-d", strtotime('+ '.$sale->period.' days')));
                        $sale[$i]=date("Y-m-d", strtotime('+ '.$sale->period.' days'));
                    }
                else
                    {
                        $sale[$i]=$_COOKIE['sale_'.$i];
                    }
                @endphp

            <a class="sale_item scroll-hidden" id="sale-link-{{$i}}">
                <div class="sale_left">
                <div class="sale_percent">-{{$sale->percent}}%</div>
                <p>{{db_translate($sale->title_ru,$sale->title_kz)}}</p>
                <button class="ui_kit_button">@lang('Подробнее')</button>
                </div>
                <div class="sale_right">
                    <img 
                        src="/img/sales/x-360-{{str_replace('.png', '.jpg', $sale->src)}}"
                        srcset="/img/sales/x-360-{{str_replace('.png', '.jpg', $sale->src)}} 500w,
                        {{--/img/sales/x-768-{{str_replace('.png', '.jpg', $sale->src)}} 600w--}}
                        ">
                    <div id="action{{$sale->id}}" class="sale_timer"></div>
                </div>
            </a>

            @endforeach
            @php
                $sale_i=$i;
            @endphp
        </div>
        <div class="arrow_buttons_wrap">
            <button class="left-arrow" id="scroll-left"></button>
            <button class="right-arrow" id="scroll-right"></button>
              </div>
    </div>
</section>

<script>
    for(let i=1; i<={{$i}}; i++)
    {
        $('#sale-link-'+i).on('click', function()
        {
            $('#sale-form-'+i).addClass('page-wrapper-active');
            //$(`#sale-form-${i} .sale-form-div`).show(300);
        });

        $('#sale-form-close-'+i).on('click', function()
        {
            $('#sale-form-'+i).removeClass('page-wrapper-active');
            //$(`#sale-form-${i} .sale-form-div`).hide(300);
        });
    }
</script>


<script>
    // Предполагаем, что у вас есть массив с данными акций
    var actions = [
            @php $j=1; @endphp
            @foreach ($sales as $sale)
        { id: "action{{$sale->id}}", endDate: "{{$end_date[$j]}}" },
        @php $j++; @endphp
        @endforeach
    ];


    actions.forEach(function(action) {
        // Конвертируем дату в формате строки в формат Date
        var countDownDate = new Date(action.endDate).getTime();

        // Обновляем таймер каждую секунду
        var x = setInterval(function() {

            // Получаем текущее время
            var now = new Date().getTime();

            // Находим разницу времени
            var distance = countDownDate - now;

            // Расчёты для дней, часов, минут и секунд
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Выводим результат в элемент с id="timer"
            document.getElementById(action.id).innerHTML = days + ":" + hours + ":" + minutes + ":" + seconds;


            // Если таймер истекает, выводим текст
            if (distance < 0) {
                clearInterval(x);
                document.getElementById(action.id).innerHTML = "Акция окончена";
            }
        }, 1000);
    });

</script>


<script>
    $('#scroll-right').on('click', function() {
        let blockWidth = document.querySelector(".sales-div .sale_item").offsetWidth + 20
        $('.sales-div').animate({
            scrollLeft: `+=${blockWidth}px`
        }, "slow");
    });
  
    $('#scroll-left').on('click', function() {
        let blockWidth = document.querySelector(".sales-div .sale_item").offsetWidth + 20
        $('.sales-div').animate({
            scrollLeft: `-=${blockWidth}px`
        }, "slow");
  
    });
  </script>
