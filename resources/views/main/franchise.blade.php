    @extends('Layouts.wrapper')

    @section('franchise')
      nav-link-selected
    @endsection

@section('seo-title')
    {{app()->db_translate($seo->seo_ru, $seo->seo_kz)}}
@endsection

@section('meta-description')
{{app()->db_translate($seo->meta_ru, $seo->meta_kz)}}
@endsection

  @push('franchise')
    <link rel="stylesheet" href="{{ asset('/css/franchise.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/media.css') }}">
  @endpush

  @section('content')


    <div id="app" class="fr_page {{'fr_page_'.$locale}}">
      <div class="fr_page_welcome">
        <div class="fr_page_welcome_wrap">
          <h1>@lang('Ремонт помещений в городах сегодня это Большая История, Большие Возможности')</h1>
          <div class="fr_page_welcome_flex">
          <div class="fr_page_welcome_info">
          <p>@lang('Факты о рынке недвижимости:')</p>
          <ul>
            <li>·@lang('Вторичное жилье часто требует ремонта')</li>
            <li>·@lang('Износ ветхого жилья и реконструкция')</li>
            <li>·@lang('Высокий вклад строительства в экономику и ВВП')</li>
            <li>·@lang('Рост числа новостроек')</li>
            <li>·@lang('Тенденция урбанизации и рост жилищного рынка')</li>
            <li>·@lang('Программы финансирования в рассрочки для ремонта ')</li>
            <li>·@lang('Растущий спрос на современный качественный ремонт')</li>
            <li>·@lang('Тренд на "умные дома" и интегрированные технологии')</li>
          </ul>
          </div>

          <a href="#fr_page_calc" class="ui_kit_button">@lang('Получить бизнес-план')</a>
        </div>
        </div>
      </div>

      <div class="fr_page_fr">
        <div class="fr_page_wrap">
        <div class="fr_page_heading">@lang('Влияние франшизы на бизнес')</div>
        <ol>
          @foreach(['Повышение эффективности', 'Лучшее управление ресурсами', 'Улучшенное взаимодействие с клиентами', 'Высокое качество услуг', 'Обоснованные решения', 'Финансовый контроль'] as $i)
          <li class="scroll-hidden"><span>@lang($i)</span></li>
          @endforeach
          {{--<li class="scroll-hidden"><span>Повышение эффективности</span></li>
          <li class="scroll-hidden"><span>Лучшее управление ресурсами</span></li>
          <li class="scroll-hidden"><span>Улучшенное взаимодействие с клиентами</span></li>
          <li class="scroll-hidden"><span>Высокое качество услуг</span></li>
          <li class="scroll-hidden"><span>Обоснованные решения</span></li>
          <li class="scroll-hidden"><span>Финансовый контроль</span></li>--}}
        </ol>
        </div>
      </div>

      <div class="fr_page_adv">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">@lang('Преимущества для клиента компании')</div>
          <ol>
            <li>
              <div class="spoiler active">
                <div class="spoiler-title">@lang('Высокое качество услуг')</div>
                <div class="spoiler-body">@lang('Строгий контроль качества и использование проверенных технологий обеспечивают высокий уровень выполненных работ.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler active">
                <div class="spoiler-title">@lang('Опытные специалисты')</div>
                <div class="spoiler-body">@lang('Квалифицированные мастера с опытом работы обеспечивают профессионализм в каждом аспекте ремонта.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Индивидуальный подход')</div>
                <div class="spoiler-body">@lang('Персонализированные решения и учет индивидуальных пожеланий клиента в проектах ремонта.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Прозрачность и честность')</div>
                <div class="spoiler-body">@lang('Ясные условия сотрудничества, отсутствие скрытых платежей и честный расчет стоимости.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Соблюдение Сроков')</div>
                <div class="spoiler-body">@lang('Строгое придерживание заявленных сроков выполнения работ.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Гарантия на Работы')</div>
                <div class="spoiler-body">@lang('Предоставление гарантии на выполненные работы, обеспечивающей дополнительное спокойствие клиента.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Широкий Спектр Услуг')</div>
                <div class="spoiler-body">@lang('Возможность выполнения различных видов ремонтных и отделочных работ.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Использование Качественных Материалов')</div>
                <div class="spoiler-body">@lang('Использование только качественных и проверенных материалов.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Полный Цикл Услуг')</div>
                <div class="spoiler-body">@lang('От проектирования до финальной сдачи объекта "под ключ" и клининга.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Доступные Цены')</div>
                <div class="spoiler-body">@lang('Конкурентоспособные цены при сохранении высокого уровня качества услуг.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Профессиональное Оборудование')</div>
                <div class="spoiler-body">@lang('Использование современного и эффективного оборудования для достижения лучших результатов.')</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">@lang('Консультации и Поддержка')</div>
                <div class="spoiler-body">@lang('Предоставление профессиональных консультаций на всех этапах сотрудничества и послегарантийное обслуживание.')</div>
              </div>
            </li>
          </ol>
        </div>
      </div>

      <div class="fr_page_soft">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">@lang('Софт компании')</div>
          <div class="fr_page_list">
            <div class="fr_page_list-card">
              <div class="fr_page_list_title">@lang('Управление персоналом')</div>
              <ul>
                <li>· @lang('Учет рабочего времени и производительности')</li>
                <li>· @lang('Планирование смен и задач')</li>
                <li>· @lang('Расчет KPI сотрудников')</li>
                <li>· @lang('Оценка навыков сотрудников')</li>
              </ul>
            </div>

            <div class="fr_page_list-card">
              <div class="fr_page_list_title">@lang('Клиентская база и CRM')</div>
              <ul>
                <li>· @lang('Управление клиентской базой')</li>
                <li>· @lang('CRM-инструменты')</li>
                <li>· @lang('Маркетинг и обратная связь')</li>
              </ul>
            </div>

            <div class="fr_page_list-card">
              <div class="fr_page_list_title">@lang('Финансовый учет')</div>
              <ul>
                <li>· @lang('Автоматизация учета и бухгалтерии')</li>
                <li>· @lang('Мониторинг доходов и расходов')</li>
                <li>· @lang('Управление налогами и отчетами')</li>
              </ul>
            </div>
            
          </div>

          <div class="fr_page_line"></div>
          <div class="fr_page_icon"></div>
          <div class="fr_page_line"></div>

          <div class="fr_page_list s">
            <div class="fr_page_list-card s">
              <div class="fr_page_list_title">@lang('Управление заказами')</div>
              <ul>
                <li>· @lang('Автоматизация приема и обработки заказов')</li>
                <li>· @lang('Распределение задач менеджерам')</li>
                <li>· @lang('Мониторинг показателей в реальном времени')</li>
              </ul>
            </div>

            <div class="fr_page_list-card s">
              <div class="fr_page_list_title">@lang('Аналитика и отчетность')</div>
              <ul>
                <li>· @lang('Расширенная аналитика процессов')</li>
                <li>· @lang('Автоматическая генерация документов')</li>
                <li>· @lang('Цифровой портрет сотрудника')</li>
              </ul>
            </div>

            <div class="fr_page_list-card s">
              <div class="fr_page_list_title">@lang('Управление качеством')</div>
              <ul>
                <li>· @lang('Сметное ПО')</li>
                <li>· @lang('Расчет материалов')</li>
                <li>· @lang('Технологические карты') </li>
                <li>· @lang('Оценка навыков исполнителей')</li>
              </ul>
            </div>
            
          </div>
        </div>
      </div>

      <div class="fr_page_steps">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">@lang('Этапы франшизы')</div>
          <ol>
            <li>
              <span class="fr_page_counter">1</span>
              <span>@lang('Заявка')</span>
            </li>
            <li>
              <span class="fr_page_counter">2</span>
              <span>@lang('Презентация')</span>
            </li>
            <li>
              <span class="fr_page_counter">3</span>
              <span>@lang('Подписание договора')</span>
            </li>
          </ol>

          <ol class="fr_page_r">
            <li>
              <span class="fr_page_counter">4</span>
              <span>@lang('Обучение')</span>
            </li>
            <li>
              <span class="fr_page_counter">5</span>
              <span>@lang('Маркетинговая подготовка')</span>
            </li>
            <li>
              <span class="fr_page_counter">6</span>
              <span>@lang('Подготовка к открытию')</span>
            </li>
          </ol>

          <ol class="m">
            <li>
              <span class="fr_page_counter">7</span>
              <span>@lang('Открытие')</span>
            </li>
            <li>
              <span class="fr_page_counter">8</span>
              <span>@lang('Наставничество')</span>
            </li>
            <li>
              <span class="fr_page_counter">9</span>
              <span>@lang('Развитие и расширение')</span>
            </li>
          </ol>
        </div>
      </div>

      <div class="fr_page_adv2">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">@lang('Преимущества франшизы')</div>
          <div class="fr_page_list">
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">@lang('Готовая бизнес-модель')</div>
              <div class="fr_page_card_text">@lang('Эффективная модель ведения бизнеса')</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">@lang('Брендовое признание')</div>
              <div class="fr_page_card_text">@lang('Узнаваемый бренд')</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">@lang('Обучение и поддержка')</div>
              <div class="fr_page_card_text">@lang('Включая маркетинг и управление')</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">@lang('Экономия на маркетинге')</div>
              <div class="fr_page_card_text">@lang('Готовые стратегии и материалы')</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">@lang('Проверенные технологии')</div>
              <div class="fr_page_card_text">@lang('Качественные современные технологии')</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">@lang('Сетевые преимущества')</div>
              <div class="fr_page_card_text">@lang('Обмен опытом с другими франчайзи')</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">@lang('Уменьшение рисков')</div>
              <div class="fr_page_card_text">@lang('Снижение рисков благодаря проверенной модели')</div>
            </div>
          </div>
        </div>
      </div>

      <div class="fr_page_get">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">@lang('Франчайзи «Эксперт Ремонта» получает')</div>
          <div class="fr_page_sections">
            <div>
              <ol>
                <li>@lang('Бизнес-поддержка:')
                  <ul>
                    <li>- @lang('Готовый бизнес-план.')</li>
                    <li>- @lang('Обучение и поддержка от центрального офиса.')</li>
                    <li>- @lang('Юридическая и бухгалтерская поддержка.')</li>
                  </ul>
                </li>
                <li>@lang('Бренд и маркетинг:')
                  <ul>
                    <li>- @lang('Право использования узнаваемого бренда.')</li>
                    <li>- @lang('Маркетинговые материалы и рекламные стратегии.')</li>
                    <li>- @lang('Эксклюзивная территория для ведения бизнеса.')</li>
                  </ul>
                </li>
                <li>@lang('Технологии и ресурсы:')
                  <ul>
                    <li>- @lang('Доступ к современным технологиям и инновациям.')</li>
                    <li>- @lang('Поставки материалов по специальным ценам.')</li>
                    <li>- @lang('Управленческие инструменты (CRM, учет).')</li>
                  </ul>
                </li>
                <li>@lang('Развитие и сетевое взаимодействие:')
                  <ul>
                    <li>- @lang('Поддержка в расширении и развитии бизнеса.')</li>
                    <li>- @lang('Возможность обмена опытом в сети франчайзи.')</li>
                    <li>- @lang('Уменьшение коммерческих рисков благодаря проверенной модели.')</li>
                  </ul>
                </li>
              </ol>
            </div>
            <img src="/franchise_files/image_2.jpg">
          </div>
        </div>
      </div>

      <div class="fr_page_calc" id="fr_page_calc">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">@lang('Калькулятор прибыли') 
            <i class="fas fa-question-circle" style="color:#9DC436"></i>
          <div id="calc_hint">@lang('Представленные данные являются консервативной оценкой, рассчитанной на основе минимально возможных показателей для регионов с населением около 300 человек. Эти показатели служат базовой линией для начального планирования и могут отличаться в зависимости от реальной экономической активности и демографических характеристик конкретного города или региона. Пользователи, заинтересованные в получении более детализированного бизнес-плана, могут заполнить форму обратной связи и проконсультироваться с нашим менеджером, который предоставит персонализированные расчеты, учитывающие уникальные аспекты в зависимости от суммы инвестиций и локализации будущего филиала.') <i class="fas fa-times"></i></div>
          </div>
          <div class="fr_page_flex">
            <div class="fr_page_calc_inner">
              <div id="range">
                <label for="investments">@lang('Инвестиции на открытие')</label>
                <input id="investments" type="range" min="1000000" max="5000000" value="1500000">
                <output id="rangevalue">1500000 ₸</output>
              </div>
              <table>
                <tr>
                  <td>@lang('Сроки')</td>
                  <td>@lang('1 год')</td>
                  <td>@lang('2 года')</td>
                </tr>
                <tr>
                  <td>@lang('Кол-во объектов')</td>
                  <td>30</td>
                  <td>46</td>
                </tr>
                <tr>
                  <td>@lang('Доход')</td>
                  <td>9 999 999 Р</td>
                  <td>9 999 999 Р</td>
                </tr>
                <tr class="fr_page_last">
                  <td>@lang('Прибыль')</td>
                  <td>9 999 999 Р</td>
                  <td>9 999 999 Р</td>
                </tr>
              </table>
            </div>
            <div class="fr_page_form">
              <form action="{{route('form.store')}}" method="POST">
                @csrf
                <div class="fr_page_form_title">@lang('Хотите получить подробный бизнес-план?')</div>
                <div class="fr_page_form_text">@lang('Оставьте заявку и наш менеджер свяжется с вами')</div>
                <input type="text" name="name" placeholder="@lang('Ваше имя')" required>
                {{--<label for="city">Выберите город</label>--}}
                <select name="city" id="city" required>
                  {{--<option>Город</option>--}}
                  @foreach($cities as $city)
                  <option value="{{$city->city}}" 
                    @selected($usr_city === $city->city && !in_array($city->city, ['Астана', 'Алматы'])) 
                    @disabled(in_array($city->city, ['Астана', 'Алматы']))
                  >{{$city->city}}</option>
                  @endforeach
                </select>
                {{--<input type="text" placeholder="Город">--}}
                <input type="text" name="phone" placeholder="+7-XXX-XXX-XX-XX" required>
                <input type="email" name="email" placeholder="@lang('Ваш Email')">
                <input type="hidden" name="sourse" value={{$page}}>
                <div class="fr_page_btn_flex"><button type="submit" class="ui_kit_button">@lang('Получить бизнес-план')</button></div>        
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>


    @push('customScripts')
      <script src="/js/franchise.js"></script>
      {{--@if(auth()->user() && auth()->user()->role === 'admin') 
        <script src="/js/dynamicPage.js"></script>
      @endif--}}
    @endPush
@endsection

