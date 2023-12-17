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
        <img src="/img/_d40b8276-e5e6-423c-bc70-36e0d3892ecc.jpg">
        <div style="display: flex; justify-content: start; width: 95%; margin: 10px auto">
            <div class="percent"><p>-{{$sale->percent}}%</p></div>
            <div class="timer"><p id="action{{$sale->id}}"></p></div>
        </div>

        <h3>{{app()->db_translate($sale->title_ru,$sale->title_kz)}}</h3>
        <p>
            Акции и скидки не суммируются.Все подробности и сроки проводимых акций Вы можете узнать, позвонив нам. О праве на акцию или скидку необходимо сообщить при подачей заявки в форме ниже.
        </p>
        <p>
            {{app()->db_translate($sale->description_ru,$sale->description_kz)}}
        </p>
        <form class="form-sale" method="post" action="{{route('form.store')}}">
            @csrf
            <input class="hidden" type="text" name="username" placeholder="Имя" required>
            <input class="hidden" type="phone" name="phone" placeholder="Телефон" required>
            <input type="hidden" name="sourse" value="{{$page}}/sale/{{$sale->title}}">
            <button class="hidden gradient_button"><span class="flare"></span><p>{{app()->translate('Участвовать')}}</p></button>
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
