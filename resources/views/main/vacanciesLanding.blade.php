@extends('Layouts.wrapper')

@section('seo-title')
  Вакансии Эксперт Ремонта
@endsection

@push('customStyles')
<link rel="stylesheet" href="{{ asset('/css/ui_kit.css') }}">
<link rel="stylesheet" href="{{ asset('/css/vacancies_landing.css') }}">
<link rel="stylesheet" href="{{ asset('/css/vacancies_landing_media.css') }}">
@endpush

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

@section('content')

<div class="vc_page_welcome">
  <div class="vc_page_welcome_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">Вакансии «Эксперт Ремонта»</div>
    <div class="vc_page_subheading ui_kit_h2_heading">Мы ищем таланты и профессионалов:</div>
    <ul>
      <li>·Прорабы, начальники участка</li>
      <li>·Менеджеры</li>
      <li>·HR-Специалисты</li>
      <li>·Программисты</li>
      <li>·Аналитики</li>
      <li>·Отделочники, строители</li>
      <li>·Маркетологи</li>
    </ul><a class="ui_kit_button vc_page_button" href="/vacancies">Смотреть все вакансии</a>
  </div>
</div>
<div class="vc_page_propose">
  <div class="vc_page_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">Что мы предлагаем:</div>
    <div class="vc_page_flex">
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Открытая и доступная среда для роста:</div>
        <div class="vc_page_card_subtitle">Возможности для профессионального и личного развития</div>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Отсутствие потолка по заработной плате:</div>
        <div class="vc_page_card_subtitle">Сдельная оплата труда Премии и KPI</div>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Перспективы карьерного роста:</div>
        <div class="vc_page_card_subtitle">Возможность выйти  на новый уровень профессионализма</div>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Работа в разных регионах:</div>
        <div class="vc_page_card_subtitle">Ежемесячное открытие новых офисов</div>
      </div>
    </div>
  </div>
</div>
<div class="vc_page_corp">
  <div class="vc_page_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">Наши корпоративные ценности</div>
    <ol>
      <li>
        <div class="vc_page_list_title">Результат начинается со мной </div>
        <div class="vc_page_list_subtitle">Активность и ответственность в работе</div>
      </li>
      <li>
        <div class="vc_page_list_title">Все начинается с потребности клиента</div>
        <div class="vc_page_list_subtitle">Клиентоориентированность</div>
      </li>
      <li>
        <div class="vc_page_list_title">Командная работа</div>
        <div class="vc_page_list_subtitle">Совместное достижение целей</div>
      </li>
      <li>
        <div class="vc_page_list_title">Инициатива и саморазвитие</div>
        <div class="vc_page_list_subtitle">Открытость во всех аспектах работы</div>
      </li>
      <li>
        <div class="vc_page_list_title">Улучшение качества и внимание к деталям</div>
        <div class="vc_page_list_subtitle">Непрерывное совершенствование услуг</div>
      </li>
      <li>
        <div class="vc_page_list_title">Инициатива и самостоятельность</div>
        <div class="vc_page_list_subtitle">Независимость в принятии решений</div>
      </li>
    </ol>
  </div>
</div>
<div class="vc_page_cult">
  <div class="vc_page_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">Культура и этика работы</div>
    <ul>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">Ценность каждого сотрудника</div>
          <div class="vc_page_list_subtitle">Признание вклада каждого в успех компании</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">Дарить радость через качество</div>
          <div class="vc_page_list_subtitle">Преданность высокому уровню удовлетворенности клиентов</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">Индивидуальная оценка и вознаграждение</div>
          <div class="vc_page_list_subtitle">Справедливая система оценки и вознаграждения</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">Карьерный рост по заслугам</div>
          <div class="vc_page_list_subtitle">Поддержка и поощрение активности и достижений</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">Сотрудничество и командная работа</div>
          <div class="vc_page_list_subtitle">Поддержка единства и уникального вклада каждого</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">Открытость к инновациям</div>
          <div class="vc_page_list_subtitle">Поощрение новаторских идей и усовершенствований</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">Уважение и этика</div>
          <div class="vc_page_list_subtitle">Создание уважительной и ценящей каждого среды</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">Обратная связь и развитие</div>
          <div class="vc_page_list_subtitle">Важность мнений и предложений сотрудников</div>
        </div>
      </li>
      <li>
        <div class="vc_page_inner_wrapper">
          <div class="vc_page_list_title">Баланс и благополучие</div>
          <div class="vc_page_list_subtitle">Гармония между работой и личной жизнью</div>
        </div>
      </li>
    </ul>
  </div>
</div>
<div class="vc_page_join">
  <div class="vc_page_wrap">
    <div class="vc_page_join_block">
      <div class="vc_page_heading ui_kit_h1_heading">Присоединяйтесь <br> к нашей команде!</div>
      <p>Присоединяйтесь к «Эксперт Ремонта» - где ваше стремление к совершенству, профессионализм и инициативность найдут ценность и признание. </p>
      <p>Мы создаем не только пространства для наших клиентов, но и возможности для наших сотрудников расти, развиваться и достигать новых карьерных высот.</p><a class="ui_kit_button vc_page_button" href="/vacancies">Смотреть все вакансии</a>
    </div>
  </div>
</div>

@include('blocks.forms.vacancy_contact_form')
@endsection

