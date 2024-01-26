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

<div class="vc_page_welcome vc_page_welcome2">
  <div class="vc_page_welcome_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">Приглашаем мастеров-партнеров</div>
    <div class="vc_page_subheading ui_kit_h2_heading">Требуются специалисты:</div>
    <ul>
      <li>·Плиточники</li>
      <li>·Электромонтажники</li>
      <li>·Сантехники</li>
      <li>·Маляры</li>
      <li>·Штукатуры</li>
      <li>·Прочие квалифицированные мастера</li>
    </ul><a class="ui_kit_button vc_page_button" href="/vacancies">Смотреть все вакансии</a>
  </div>
</div>
<div class="vc_page_pripciples">
  <div class="vc_page_wrap">
    <div class="vc_page_flex">
      <div class="vc_page_flex_card">
        <div class="vc_page_flex_card_title">Принципы работы <br> компании</div>
        <ul>
          <li> 
            <p class="vc_page_list_title">Условия работы</p>
            <p class="vc_page_list_subtitle">Мы работаем исключительно на условиях, которые соответствуют внутренним стандартам нашей компании</p>
          </li>
          <li> 
            <p class="vc_page_list_title">Финансовая политика</p>
            <p class="vc_page_list_subtitle">Отказываемся от схем работы, предполагающих передачу объектов за процент от сделки. Вместо этого предлагаем прозрачную систему прямых сдельных выплат.</p>
          </li>
          <li> 
            <p class="vc_page_list_title">Защита объектов</p>
            <p class="vc_page_list_subtitle">Защищаем наши объекты от возможного вмешательства сторонних подрядчиков или бригад, обеспечивая таким образом непрерывность и качество работы.</p>
          </li>
        </ul>
      </div>
      <div class="vc_page_flex_card">
        <div class="vc_page_flex_card_title">Направление развития команды</div>
        <ul>
          <li> 
            <p class="vc_page_list_title">Долгосрочные отношения</p>
            <p class="vc_page_list_subtitle">Наша цель - строить долгосрочные отношения с отделочниками, гарантируя стабильность оплаты труда и надежность сотрудничества.</p>
          </li>
          <li> 
            <p class="vc_page_list_title">Постоянное сотрудничество</p>
            <p class="vc_page_list_subtitle">Мы ориентированы на долговременное взаимодействие и предпочитаем избегать одноразовых проектов и шабашек в пользу постоянного партнерства с исполнителем работ.</p>
          </li>
          <li> 
            <p class="vc_page_list_title">Прозрачность и честность</p>
            <p class="vc_page_list_subtitle">Наши принципы работы основаны на честности и прозрачности во всех аспектах взаимодействия, что подразумевает уважение прав и интересов каждого сотрудника.</p>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="vc_page_skills">
  <div class="vc_page_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">Нам требуются профессиональные навыки</div>
    <div class="vc_page_flex">
      <div class="vc_page_skill">Укладка ламината, паркета</div>
      <div class="vc_page_skill">Демонтажные работы</div>
      <div class="vc_page_skill">Монтаж теплых полов</div>
      <div class="vc_page_skill">Сантехнические работы</div>
      <div class="vc_page_skill">Чистовая подрезка плитки</div>
      <div class="vc_page_skill">Оклейка обоев, фресок</div>
      <div class="vc_page_skill">Нанесение декоративных штукатурок</div>
      <div class="vc_page_skill">Малярные работы</div>
      <div class="vc_page_skill">Создание наливных полов</div>
      <div class="vc_page_skill">Монтаж багетов, плинтусов</div>
      <div class="vc_page_skill">Шумоизоляция помещений</div>
      <div class="vc_page_skill">Оклейка декоративного кирпича</div>
      <div class="vc_page_skill">Уборка после работ</div>
      <div class="vc_page_skill">Электромонтажные работы</div>
      <div class="vc_page_skill">Проверка качества работ</div>
      <div class="vc_page_skill">Использование технологических карт</div>
      <div class="vc_page_skill">Знание СНиП/ТУ</div>
      <div class="vc_page_skill">Работа с натуральным камнем</div>
      <div class="vc_page_skill">Работа с проектной документацией</div>
      <div class="vc_page_skill">Установка вентиляционных систем</div>
    </div>
  </div>
</div>
<div class="vc_page_value">
  <div class="vc_page_wrap">
    <div class="vc_page_flex">
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title ui_kit_h1_heading">Мы поощряем</div>
        <div class="vc_page_card_subtitle">Навыки, которые мы ценим в наших сотрудниках</div><a class="ui_kit_button vc_page_button" href="#vc_page_contact">Присоединиться</a>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Профессионализм и компетентность</div>
        <ul>
          <li>- Глубокие знания</li>
          <li>- Стремление к улучшению навыков</li>
        </ul>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Надежность и ответственность</div>
        <ul>
          <li>- Соблюдение сроков</li>
          <li> - Ответственность перед клиентами и компанией</li>
        </ul>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Этичность и честность</div>
        <ul>
          <li>- Прозрачность работы</li>
          <li>- Честность к компании и клиентам</li>
        </ul>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Готовность к обучению и развитию</div>
        <ul>
          <li> - Открытость к новым знаниям</li>
          <li>- Желание повышать квалификацию</li>
        </ul>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Экономическое мышление</div>
        <ul>
          <li>- Рациональное использование ресурсов</li>
          <li>  - Осознанное отношение к затратам</li>
        </ul>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Уважение к нормам безопасности</div>
        <ul>
          <li>- Соблюдение правил безопасности</li>
          <li>- Ответственное отношение к безопасности</li>
        </ul>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Качество и внимание к деталям</div>
        <ul>
          <li>- Тщательность выполнения работ</li>
          <li> - Внимание к мелочам</li>
        </ul>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Организационные навыки</div>
        <ul>
          <li>- Планирование работы</li>
          <li>- Поддержание порядка</li>
        </ul>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Уважение и взаимопомощь</div>
        <ul>
          <li>- Взаимоуважение</li>
          <li>- Готовность помогать коллегам</li>
        </ul>
      </div>
      <div class="vc_page_card ui_kit_card">
        <div class="vc_page_card_title">Коммуникативные навыки</div>
        <ul>
          <li>- Глубокие знания</li>
          <li>- Стремление к улучшению навыков</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="vc_page_values2">
  <div class="vc_page_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">Ключевые Ценности <br> «Эксперт Ремонта»</div>
    <div class="vc_page_value_item"> 
      <div class="vc_page_value_item_counter">01. </div>
      <div class="vc_page_value_item_text">Профессиональная надежность и ответственность</div>
    </div>
    <div class="vc_page_value_item"> 
      <div class="vc_page_value_item_counter">02. </div>
      <div class="vc_page_value_item_text">Высокий уровень мастерства и детализация</div>
    </div>
    <div class="vc_page_value_item"> 
      <div class="vc_page_value_item_counter">03. </div>
      <div class="vc_page_value_item_text">Инициативность и творческий подход</div>
    </div>
    <div class="vc_page_value_item"> 
      <div class="vc_page_value_item_counter">04. </div>
      <div class="vc_page_value_item_text">Уважение к экологии и ресурсам</div>
    </div>
    <div class="vc_page_value_item"> 
      <div class="vc_page_value_item_counter">05. </div>
      <div class="vc_page_value_item_text">Сотрудничество и командная работа</div>
    </div>
    <div class="vc_page_value_item"> 
      <div class="vc_page_value_item_counter">06. </div>
      <div class="vc_page_value_item_text">Постоянное обучение и развитие</div>
    </div>
    <div class="vc_page_value_item"> 
      <div class="vc_page_value_item_counter">07. </div>
      <div class="vc_page_value_item_text">Честность и прозрачность в работе</div>
    </div>
  </div>
</div>
<div class="vc_page_join vc_page_join_master">
  <div class="vc_page_wrap">
    <div class="vc_page_join_block">
      <div class="vc_page_heading ui_kit_h1_heading">Присоединяйтесь <br> к нашей команде!</div>
      <p>Мы ищем мастеров-отделочников, которые разделяют наши ценности и готовы вместе с нами стремиться к совершенству в каждом проекте.</p>
      <p>В «Эксперт Ремонта» ваш талант и усердие будут по достоинству оценены и поддержаны!</p><a href="/vacancies" class="ui_kit_button vc_page_button">Смотреть все вакансии</a>
    </div>
  </div>
</div>
@include('blocks.forms.vacancy_contact_form')

@endsection
