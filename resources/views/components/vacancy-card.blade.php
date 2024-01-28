@props(['v'])

<div class="vacancies_page_card">
  <div class="vacancies_page_card_title ui_kit_h3_heading"> <a href="{{route('vacancy.show', $v->url)}}">{{app()->db_translate($v->name, $v->name_kz)}}</a></div>
  <div class="vacancies_page_card_salary ui_kit_h3_heading">@if($v->salary_from){{$v->salary_from}}-{{$v->salary_to}} ₸@else зп: по результатам собеседования@endif</div>
  <div class="vacancies_page_card_desc">
    {{--Покраска, лакирование поверхности, подготовка поверхности под покраску; выполнение работ по оштукатуриванию поверхности, ремонту штукатурки; нанесение защитного покрытия поверхности специальными растворами, жидкостями, смесями;--}}
    {{app()->db_translate($v->overview, $v->overview_kz)}}
  </div>
  <div class="vacancies_page_card_info">{{$v->city->city}}, опыт: {{$v->experience}}</div>
  <div class="vacancies_page_inline_flex">
    <button class="ui_kit_button vacancies_page_button show_form">Откликнуться</button>
    <a class="ui_kit_button ui_kit_button_v2 vacancies_page_button" data-phone="{{$v->phone}}"> Показать телефон</a>
  </div>
</div>