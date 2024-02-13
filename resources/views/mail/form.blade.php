{{--Новая заявка с сайта--}}
{{$props->title}} <br>

<b>Имя:</b> {{$props->req_data['name']}} <br>
<b>Телефон:</b> {{$props->req_data['phone']}} <br>
<b>Город:</b> {{$props->req_data['city']}} <br>
<b>Дата создания заявки:</b> {{$props->date}} <br>
@if(isset($props->service)) <b>Услуга:</b> {{$props->service}} <br> @endif
@if(isset($props->vacancy)) <b>Вакансия:</b> {{$props->vacancy->name}} <br> @endif
@if(isset($props->sale)) <b>Акция:</b> {{$props->sale->title_ru}} <br> @endif
<b>URL:</b> {{$props->url}} <br>
@if(isset($props->req_data['email'])) <b>Email:</b> {{$props->req_data['email']}} @endif