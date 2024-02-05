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
<div class="page-wrapper " id="sale-form-{{$i}}">
    <div class="sale-form-div">
        <button class="form-sale-close" id="sale-form-close-{{$i}}"><i class="fas fa-times"></i></button>
        <img src="/img/sales/{{$sale->src}}"
        srcset="/img/sales/x-360-{{str_replace('.png', '.jpg', $sale->src)}} 400w,
        /img/sales/x-768-{{str_replace('.png', '.jpg', $sale->src)}} 600w">
        <div style="display: flex; justify-content: start; width: 95%; margin: 10px auto">
            <div class="percent"><p>-{{$sale->percent}}%</p></div>
            <div class="timer"><p id="action2{{$sale->id}}"></p></div>
        </div>

        <h3>{{app()->db_translate($sale->title_ru,$sale->title_kz)}}</h3>
        <p>
            {{app()->db_translate($sale->description_ru,$sale->description_kz)}}
        </p>
        <form class="form-sale" method="post" action="{{route('form.store')}}">
            @csrf
            <input class="hidden" type="text" name="name" placeholder="Имя" required>
            <input class="hidden" type="phone" name="phone" placeholder="Телефон" required>
            <input type="hidden" name="sourse" value="{{$page}}/sale/{{$sale->title}}">
            <input type="hidden" id="cid" value="" name="cid">
            <input type="hidden" id="ycid" value="" name="ycid">
            <button type="submit" class="hidden gradient_button"><span class="flare"></span><p>{{app()->translate('Участвовать')}}</p></button>
        </form>
    </div>
</div>


@endforeach


<script>
    // Предполагаем, что у вас есть массив с данными акций
var actions = [
        @php $j=1; @endphp
        @foreach ($sales as $sale)
    { id: "action2{{$sale->id}}", endDate: "{{$end_date[$j]}}" },
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
        document.getElementById(action.id).innerHTML = days + "д " + hours + "ч " + minutes + "м " + seconds + "с ";


        // Если таймер истекает, выводим текст
        if (distance < 0) {
            clearInterval(x);
            document.getElementById(action.id).innerHTML = "Акция окончена";
        }
    }, 1000);
});

</script>

<script>
    function getYClientID() {
        var match = document.cookie.match('(?:^|;)\\s*_ym_uid=([^;]*)');
        return (match) ? decodeURIComponent(match[1]) : false;
    }

    function getGoogleClientID()
    {
        var match = document.cookie.match('(?:^|;)\\s*_ga=([^;]*)');
        var raw = (match) ? decodeURIComponent(match[1]) : null;
        if (raw)
        {
            match = raw.match(/(\d+\.\d+)$/);
        }
        var gacid = (match) ? match[1] : null;
        if (gacid)
        {
            return gacid;
        }
    }

    document.addEventListener('DOMContentLoaded', function(){
        document.getElementById('cid').value=getGoogleClientID();
        document.getElementById('ycid').value=getYClientID();
});

</script>
