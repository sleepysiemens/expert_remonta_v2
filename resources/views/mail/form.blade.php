{{--Новая заявка с сайта--}}
{{$props->title}}

<b>Имя:</b> {{$props->req_data['name']}}
<b>Телефон:</b> {{$props->req_data['phone']}}
<b>Город:</b> {{$props->req_data['city']}}
<b>Дата создания заявки:</b> {{$props->date}}
@if(isset($props->service)) <b>Услуга:</b> {{$props->service}} @endif
@if(isset($props->vacancy)) <b>Вакансия:</b> {{$props->vacancy->name}} @endif
@if(isset($props->sale)) <b>Акция:</b> {{$props->sale->title_ru}} @endif
<b>URL:</b> {{$props->url}}
@if(isset($props->req_data['email'])) <b>Email:</b> {{$props->req_data['email']}} @endif