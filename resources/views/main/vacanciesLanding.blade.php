@extends('Layouts.wrapper')

@section('seo-title')
  {{db_translate($seo->seo_ru, $seo->seo_kz)}}
@endsection

@section('meta-description') {{db_translate($seo->meta_ru, $seo->meta_kz)}} @endsection

@if($seo->canonical)
@section('seo-data') <link rel="canonical" href="{{$seo->canonical}}">@endsection
@endif

@push('customStyles')
{{--<link rel="stylesheet" href="{{ asset('/css/ui_kit.css') }}">
<link rel="stylesheet" href="{{ asset('/css/vacancies_landing.css') }}">
<link rel="stylesheet" href="{{ asset('/css/vacancies_landing_media.css') }}">--}}
<link rel="stylesheet" href="/css/ui_kit.css">
<link rel="stylesheet" href="/css/vacancies_landing.css">
<link rel="stylesheet" href="/css/vacancies_landing_media.css">
@endpush

@section('content')
<div class="{{'vc_page_'.$locale}}">
<div class="vc_page_welcome {{'vc_page_welcome_'.$locale}}">
  <div class="vc_page_welcome_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">@lang('Вакансии «Эксперт Ремонта»')</div>
    <div class="vc_page_subheading ui_kit_h2_heading">@lang('Мы ищем таланты и профессионалов:')</div>
    <ul>
      <li>·@lang('Прорабы, начальники участка')</li>
      <li>·@lang('Менеджеры')</li>
      <li>·@lang('HR-Специалисты')</li>
      <li>·@lang('Программисты')</li>
      <li>·@lang('Аналитики')</li>
      <li>·@lang('Отделочники, строители')</li>
      <li>·@lang('Маркетологи')</li>
    </ul><a class="ui_kit_button vc_page_button" href="/vacancies">@lang('Смотреть все вакансии')</a>
  </div>
</div>
<div class="vc_page_propose">
  <div class="vc_page_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">@lang('Что мы предлагаем:')</div>
    <div class="vc_page_flex">
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">@lang('Открытая и доступная среда для роста:')</div>
        <div class="vc_page_card_subtitle">@lang('Возможности для профессионального и личного развития')</div>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">@lang('Отсутствие потолка по заработной плате:')</div>
        <div class="vc_page_card_subtitle">@lang('Сдельная оплата труда Премии и KPI')</div>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">@lang('Перспективы карьерного роста:')</div>
        <div class="vc_page_card_subtitle">@lang('Возможность выйти на новый уровень профессионализма')</div>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">@lang('Работа в разных регионах:')</div>
        <div class="vc_page_card_subtitle">@lang('Ежемесячное открытие новых офисов')</div>
      </div>
    </div>
  </div>
</div>
<div class="vc_page_corp">
  <div class="vc_page_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">@lang('Наши корпоративные ценности')</div>
    <ol>
      <li>
        <div class="vc_page_list_title">@lang('Результат начинается со мной')</div>
        <div class="vc_page_list_subtitle">@lang('Активность и ответственность в работе')</div>
      </li>
      <li>
        <div class="vc_page_list_title">@lang('Все начинается с потребности клиента')</div>
        <div class="vc_page_list_subtitle">@lang('Клиентоориентированность')</div>
      </li>
      <li>
        <div class="vc_page_list_title">@lang('Командная работа')</div>
        <div class="vc_page_list_subtitle">@lang('Совместное достижение целей')</div>
      </li>
      <li>
        <div class="vc_page_list_title">@lang('Инициатива и саморазвитие')</div>
        <div class="vc_page_list_subtitle">@lang('Открытость во всех аспектах работы')</div>
      </li>
      <li>
        <div class="vc_page_list_title">@lang('Улучшение качества и внимание к деталям')</div>
        <div class="vc_page_list_subtitle">@lang('Непрерывное совершенствование услуг')</div>
      </li>
      <li>
        <div class="vc_page_list_title">@lang('Инициатива и самостоятельность')</div>
        <div class="vc_page_list_subtitle">@lang('Независимость в принятии решений')</div>
      </li>
    </ol>
  </div>
</div>
<div class="vc_page_cult">
  <div class="vc_page_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">@lang('Культура и этика работы')</div>
    <ul>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">@lang('Ценность каждого сотрудника')</div>
          <div class="vc_page_list_subtitle">@lang('Признание вклада каждого в успех компании')</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">@lang('Дарить радость через качество')</div>
          <div class="vc_page_list_subtitle">@lang('Преданность высокому уровню удовлетворенности клиентов')</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">@lang('Индивидуальная оценка и вознаграждение')</div>
          <div class="vc_page_list_subtitle">@lang('Справедливая система оценки и вознаграждения')</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">@lang('Карьерный рост по заслугам')</div>
          <div class="vc_page_list_subtitle">@lang('Поддержка и поощрение активности и достижений')</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">@lang('Сотрудничество и командная работа')</div>
          <div class="vc_page_list_subtitle">@lang('Поддержка единства и уникального вклада каждого')</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">@lang('Открытость к инновациям')</div>
          <div class="vc_page_list_subtitle">@lang('Поощрение новаторских идей и усовершенствований')</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">@lang('Уважение и этика')</div>
          <div class="vc_page_list_subtitle">@lang('Создание уважительной и ценящей каждого среды')</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">@lang('Обратная связь и развитие')</div>
          <div class="vc_page_list_subtitle">@lang('Важность мнений и предложений сотрудников')</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">@lang('Баланс и благополучие')</div>
          <div class="vc_page_list_subtitle">@lang('Гармония между работой и личной жизнью')</div>
        </div>
      </li>
    </ul>
  </div>
</div>
<div class="vc_page_join">
  <div class="vc_page_wrap">
    <div class="vc_page_join_block">
      <div class="vc_page_heading ui_kit_h1_heading">@lang('Присоединяйтесь <br> к нашей команде!')</div>
      <p>@lang('Присоединяйтесь к «Эксперт Ремонта» - где ваше стремление к совершенству, профессионализм и инициативность найдут ценность и признание.')</p>
      <p>@lang('Мы создаем не только пространства для наших клиентов, но и возможности для наших сотрудников расти, развиваться и достигать новых карьерных высот.')</p>
      <a class="ui_kit_button vc_page_button" href="/vacancies">@lang('Смотреть все вакансии')</a>
    </div>
  </div>
</div>

@include('blocks.forms.vacancy_contact_form')
</div>
@endsection

@push('customScripts')
<script>
  function showFile(input) {
  let file = input.files[0];
  document.querySelector('label[for=file]').textContent = file.name
}

document.querySelector('#file').addEventListener('change', e => {
  showFile(document.querySelector('#file'))
})
</script>
@endpush

