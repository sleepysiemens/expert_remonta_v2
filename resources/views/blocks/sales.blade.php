<section class="sales">
    <h1 class="section-header hidden">{{app()->translate('Специальные предложения')}}</h1>
    <div class="review-wrapper">
        <div class="reviews-div" style="height: 285px">

            @php
                $i=0;
            @endphp

            @foreach ($sales as $sale)
            @php
                $i++;
            @endphp

                @php
                if(!isset($_COOKIE['sale_'.$i]))
                    {
                        setcookie('sale_'.$i, date("Y-m-d", strtotime('+ '.$sale->period.' days')));
                    }
                @endphp

            <a class="sale-banner scroll-hidden" id="sale-link-{{$i}}">
                <span class="top-right-percent"><p>-{{$sale->percent}}%</p></span>
                <div class="sale-bg">
                    <img src=" /img/sales/{{$sale->src}}">
                </div>

                <div class="sale-text-div">
                    <div class="sale-text-subdiv">
                        <p>{{app()->db_translate($sale->title_ru,$sale->title_kz)}}</p>
                    </div>
                    <div class="percent2"><p id="action2{{$sale->id}}"></p></div>
                </div>
            </a>

            @endforeach
            @php
                $sale_i=$i;
            @endphp
        </div>
    </div>
</section>

<script>
    for(let i=1; i<={{$i}}; i++)
    {
        $('#sale-link-'+i).on('click', function()
        {
            $('#sale-form-'+i).addClass('page-wrapper-active');
        });

        $('#sale-form-close-'+i).on('click', function()
        {
            $('#sale-form-'+i).removeClass('page-wrapper-active');
        });
    }
</script>

<script>
    // Предполагаем, что у вас есть массив с данными акций
    var actions2 = [
            @php $j=1; @endphp
            @foreach ($sales as $sale)
        { id: "action{{$sale->id}}", endDate: "{{$_COOKIE['sale_'.$j]}}" },
        @php $j++; @endphp
        @endforeach
    ];


    actions2.forEach(function(action) {
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
            document.getElementById(action.id).innerHTML = days + "д " + hours + "ч " + minutes + "м " + seconds + "с ";

            // Если таймер истекает, выводим текст
            if (distance < 0) {
                clearInterval(x);
                document.getElementById(action.id).innerHTML = "Окончена";
            }
        }, 1000);
    });

</script>

