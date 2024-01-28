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
    {{--<script src="/example.js"></script>--}}
    <link rel="stylesheet" href="{{ asset('/css/franchise.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/media.css') }}">
  @endpush

  @section('content')


    <div id="app" class="fr_page">
      <div class="fr_page_welcome">
        <div class="fr_page_welcome_wrap">
          <h1>Ремонт помещений в городах сегодня это Большая История, Большие Возможности</h1>
          <div class="fr_page_welcome_flex">
          <div class="fr_page_welcome_info">
          <p>@lang('Факты о рынке недвижимости:')</p>
          <ul>
            <li>·Вторичное жилье часто требует ремонта</li>
            <li>·Износ ветхого жилья и реконструкция</li>
            <li>·Высокий вклад строительства в экономику и ВВП</li>
            <li>·Рост числа новостроек</li>
            <li>·Тенденция урбанизации и рост жилищного рынка</li>
          </ul>
          </div>

          <a href="#fr_page_calc">Получить бизнес-план</a>
        </div>
        </div>
      </div>

      <div class="fr_page_fr">
        <div class="fr_page_wrap">
        <div class="fr_page_heading">Влияние франшизы на бизнес</div>
        <ol>
          <li class="scroll-hidden"><span>Повышение эффективности</span></li>
          <li class="scroll-hidden"><span>Лучшее управление ресурсами</span></li>
          <li class="scroll-hidden"><span>Улучшенное взаимодействие с клиентами</span></li>
          <li class="scroll-hidden"><span>Высокое качество услуг</span></li>
          <li class="scroll-hidden"><span>Обоснованные решения</span></li>
          <li class="scroll-hidden"><span>Финансовый контроль</span></li>
        </ol>
        </div>
      </div>

      <div class="fr_page_adv">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">Преимущества для клиента компании</div>
          <ol>
            <li>
              <div class="spoiler active">
                <div class="spoiler-title">Высокое качество услуг</div>
                <div class="spoiler-body">Строгий контроль качества и использование проверенных технологий обеспечивают высокий уровень выполненных работ.</div>
              </div>
            </li>
            <li>
              <div class="spoiler active">
                <div class="spoiler-title">Опытные специалисты</div>
                <div class="spoiler-body">Квалифицированные мастера с опытом работы обеспечивают профессионализм в каждом аспекте ремонта.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Индивидуальный подход</div>
                <div class="spoiler-body">Персонализированные решения и учет индивидуальных пожеланий клиента в проектах ремонта.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Прозрачность и честность</div>
                <div class="spoiler-body">Ясные условия сотрудничества, отсутствие скрытых платежей и честный расчет стоимости.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Соблюдение Сроков</div>
                <div class="spoiler-body">Строгое придерживание заявленных сроков выполнения работ.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Гарантия на Работы</div>
                <div class="spoiler-body">Предоставление гарантии на выполненные работы, обеспечивающей дополнительное спокойствие клиента.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Широкий Спектр Услуг</div>
                <div class="spoiler-body">Возможность выполнения различных видов ремонтных и отделочных работ.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Использование Качественных Материалов</div>
                <div class="spoiler-body">Использование только качественных и проверенных материалов.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Полный Цикл Услуг</div>
                <div class="spoiler-body">От проектирования до финальной сдачи объекта "под ключ" и клининга.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Доступные Цены</div>
                <div class="spoiler-body">Конкурентоспособные цены при сохранении высокого уровня качества услуг.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Профессиональное Оборудование</div>
                <div class="spoiler-body">Использование современного и эффективного оборудования для достижения лучших результатов.</div>
              </div>
            </li>
            <li>
              <div class="spoiler">
                <div class="spoiler-title">Консультации и Поддержка</div>
                <div class="spoiler-body">Предоставление профессиональных консультаций на всех этапах сотрудничества и послегарантийное обслуживание.</div>
              </div>
            </li>
          </ol>
        </div>
      </div>

      <div class="fr_page_soft">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">Софт компании</div>
          <div class="fr_page_list">
            <div class="fr_page_list-card">
              <div class="fr_page_list_title">Управление персоналом</div>
              <ul>
                <li>· Учет рабочего времени и производительности</li>
                <li>· Планирование смен и задач</li>
                <li>· Расчет KPI сотрудников</li>
                <li>· Оценка навыков сотрудников</li>
              </ul>
            </div>

            <div class="fr_page_list-card">
              <div class="fr_page_list_title">Клиентская база и CRM</div>
              <ul>
                <li>· Управление клиентской базой</li>
                <li>· CRM-инструменты</li>
                <li>· Маркетинг и обратная связь</li>
              </ul>
            </div>

            <div class="fr_page_list-card">
              <div class="fr_page_list_title">Финансовый учет</div>
              <ul>
                <li>· Автоматизация учета и бухгалтерии</li>
                <li>· Мониторинг доходов и расходов</li>
                <li>· Управление налогами и отчетами</li>
              </ul>
            </div>
            
          </div>

          <div class="fr_page_line"></div>
          <div class="fr_page_icon"></div>
          <div class="fr_page_line"></div>

          <div class="fr_page_list s">
            <div class="fr_page_list-card s">
              <div class="fr_page_list_title">Управление заказами</div>
              <ul>
                <li>· Автоматизация приема и обработки заказов</li>
                <li>· Распределение задач менеджерам</li>
                <li>· Мониторинг показателей в реальном времени</li>
              </ul>
            </div>

            <div class="fr_page_list-card s">
              <div class="fr_page_list_title">Аналитика и отчетность</div>
              <ul>
                <li>· Расширенная аналитика процессов</li>
                <li>· Автоматическая генерация документов</li>
                <li>· Цифровой портрет сотрудника</li>
              </ul>
            </div>

            <div class="fr_page_list-card s">
              <div class="fr_page_list_title">Управление качеством</div>
              <ul>
                <li>· Сметное ПО</li>
                <li>· Расчет материалов</li>
                <li>· Технологические карты </li>
                <li>· Оценка навыков исполнителей</li>
              </ul>
            </div>
            
          </div>
        </div>
      </div>

      <div class="fr_page_steps">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">Этапы франшизы</div>
          <ol>
            <li>
              <span class="fr_page_counter">1</span>
              <span>Заявка</span>
            </li>
            <li>
              <span class="fr_page_counter">2</span>
              <span>Презентация</span>
            </li>
            <li>
              <span class="fr_page_counter">3</span>
              <span>Подписание договора</span>
            </li>
          </ol>

          <ol class="fr_page_r">
            <li>
              <span class="fr_page_counter">4</span>
              <span>Обучение</span>
            </li>
            <li>
              <span class="fr_page_counter">5</span>
              <span>Маркетинговая подготовка</span>
            </li>
            <li>
              <span class="fr_page_counter">6</span>
              <span>Подготовка к открытию</span>
            </li>
          </ol>

          <ol class="m">
            <li>
              <span class="fr_page_counter">7</span>
              <span>Открытие</span>
            </li>
            <li>
              <span class="fr_page_counter">8</span>
              <span>Наставничество</span>
            </li>
            <li>
              <span class="fr_page_counter">9</span>
              <span>Развитие и расширение </span>
            </li>
          </ol>
        </div>
      </div>

      <div class="fr_page_adv2">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">Преимущества франшизы</div>
          <div class="fr_page_list">
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">Готовая бизнес-модель</div>
              <div class="fr_page_card_text">Эффективная модель ведения бизнеса</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">Брендовое признание</div>
              <div class="fr_page_card_text">Узнаваемый бренд</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">Обучение и поддержка</div>
              <div class="fr_page_card_text">Включая маркетинг и управление</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">Экономия на маркетинге</div>
              <div class="fr_page_card_text">Готовые стратегии и материалы</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">Проверенные технологии</div>
              <div class="fr_page_card_text">Качественные современные технологии</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">Сетевые преимущества</div>
              <div class="fr_page_card_text">Обмен опытом с другими франчайзи</div>
            </div>
            <div class="fr_page_list_card">
              <div class="fr_page_card_heading">Уменьшение рисков</div>
              <div class="fr_page_card_text">Снижение рисков благодаря проверенной модели</div>
            </div>
          </div>
        </div>
      </div>

      <div class="fr_page_get">
        <div class="fr_page_wrap">
          <div class="fr_page_heading">Франчайзи «Эксперт Ремонта» получает</div>
          <div class="fr_page_sections">
            <div>
              <ol>
                <li>Бизнес-поддержка:
                  <ul>
                    <li>- Готовый бизнес-план.</li>
                    <li>- Обучение и поддержка от центрального офиса.</li>
                    <li>- Юридическая и бухгалтерская поддержка.</li>
                  </ul>
                </li>
                <li>Бренд и маркетинг:
                  <ul>
                    <li>- Право использования узнаваемого бренда.</li>
                    <li>- Маркетинговые материалы и рекламные стратегии.</li>
                    <li>- Эксклюзивная территория для ведения бизнеса.</li>
                  </ul>
                </li>
                <li>Технологии и ресурсы:
                  <ul>
                    <li>- Доступ к современным технологиям и инновациям.</li>
                    <li>- Поставки материалов по специальным ценам.</li>
                    <li>- Управленческие инструменты (CRM, учет).</li>
                  </ul>
                </li>
                <li>Развитие и сетевое взаимодействие:
                  <ul>
                    <li>- Поддержка в расширении и развитии бизнеса.</li>
                    <li>- Возможность обмена опытом в сети франчайзи.</li>
                    <li>- Уменьшение коммерческих рисков благодаря проверенной модели.</li>
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
          <div class="fr_page_heading">Калькулятор прибыли</div>
          <div class="fr_page_flex">
            <div class="fr_page_calc_inner">
              <div id="range">
                <label for="investments">Инвестиции на открытие</label>
                <input id="investments" type="range" min="1000000" max="5000000" value="1500000">
                <output id="rangevalue">1500000 ₸</output>
              </div>
              <table>
                <tr>
                  <td>Сроки</td>
                  <td>1 год</td>
                  <td>2 года</td>
                </tr>
                <tr>
                  <td>Кол-во объектов</td>
                  <td>30</td>
                  <td>46</td>
                </tr>
                <tr>
                  <td>Доход</td>
                  <td>9 999 999 Р</td>
                  <td>9 999 999 Р</td>
                </tr>
                <tr class="fr_page_last">
                  <td>Прибыль</td>
                  <td>9 999 999 Р</td>
                  <td>9 999 999 Р</td>
                </tr>
              </table>
            </div>
            <div class="fr_page_form">
              <form action="{{route('form.store')}}" method="POST">
                @csrf
                <div class="fr_page_form_title">Хотите получить подробный бизнес-план?</div>
                <div class="fr_page_form_text">Оставьте заявку и наш менеджер свяжется с вами</div>
                <input type="text" name="name" placeholder="Ваше имя" required>
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
                <input type="email" name="email" placeholder="Ваш email">
                <input type="hidden" name="sourse" value={{$page}}>
                <div class="fr_page_btn_flex"><button type="submit">Получить бизнес план</button></div>        
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{--@if(auth()->user() && auth()->user()->role === 'admin')
      <script>
        // https://developer.mozilla.org/en-US/docs/Glossary/Base64#the_unicode_problem 
        function base64ToBytes(base64) {
  const binString = atob(base64);
  return Uint8Array.from(binString, (m) => m.codePointAt(0));
}

function bytesToBase64(bytes) {
  const binString = String.fromCodePoint(...bytes);
  return btoa(binString);
}
        function updateContent(html) {
          //console.log(bytesToBase64(new TextEncoder().encode(html)));
          //console.log(btoa(html))
          //return
          //let content = bytesToBase64(new TextEncoder().encode(html))
          
        const headers = new Headers({
            //'Content-Type': 'x-www-form-urlencoded',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': `{{csrf_token()}}`
        });
          fetch(`/admin/dynamic-page/franchise`, {
            method: 'PUT',
            headers,
            //body: { page: 'franchise', html: JSON.stringify(html)}
            //body: { page: 'franchise', html: html}
            //body: { page: 'franchise', html: btoa(html)}
            //body: { page: 'franchise', html: bytesToBase64(new TextEncoder().encode(html))}
            //body: { page: 'franchise', content: '123'}
            //body: { page: '123'}
            // да, надо весь body превращать в json
            body: JSON.stringify({page: 'franchise', html: html})
        }).then(response => {
          //response.json()
          console.log('updated')
        })
        }
        let app = document.querySelector('#app')
        app.childNodes.forEach(node => {
          if(node.tagName !== undefined) {
            node.setAttribute('contenteditable', true)
            // только не на инпут бы, а на ctrl + s сделать
            node.addEventListener('input', e => {
              // вычищать надо будет contenteditable
              //console.log(e.target.parentNode.innerHTML)
              updateContent(e.target.parentNode.innerHTML)
              //console.log(e)
              //console.log(e.target.innerHTML)
              // даже скорее e.target.parentNode.innerHTML
              // ага, и вот здесь надо делать ajax запрос на редактирование html, огонь!
              // ну и надо завести табличку для хранения кода динамических страниц
            })
          }
        })
      </script>
    @endif--}}

    <script>
      let option = document.querySelector('.fr_page_form select option:nth-of-type(1)')
      option.textContent = option.textContent + " (занято)"
      option = document.querySelector('.fr_page_form select option:nth-of-type(2)')
      option.textContent = option.textContent + " (занято)"

      document.addEventListener('click', function(event) {
  if(event.target.classList.contains('spoiler-title')) {
    let spoiler = event.target.parentNode

    if(spoiler.classList.contains('active')) {
      spoiler.classList.remove('active') 
    }
    else {
      spoiler.classList.add('active')
    }
  }
})

const rangeInput = document.querySelector('input[type="range"]')
calcObjectsCount(1500000)

rangeInput.addEventListener('input', e => {
  let percent = (Math.round(100 / (4000000 / Number(e.target.value))) - 25)
  percent = percent <= 100 ? percent : 100
  percent -= 5
  if(percent > 75) percent -= 5
  if(percent > 85) percent -= 5
  //console.log(percent)
  document.querySelector('#rangevalue').value = e.target.value + " ₸"
  document.querySelector('#rangevalue').style.left = `${percent}%`
  if(percent > 84) document.querySelector('#rangevalue').style.fontSize = '16px'
  else document.querySelector('#rangevalue').style.fontSize = '18px'
  calcObjectsCount(Number(e.target.value))
})

function calcObjectsCount(money, idx = null) {
  let initialMoney = money
  // money это инвестиции, значение которое приходит из инпута
  // отнимаем сразу 500к на подготовку
  // оплата труда административного преснола, по месяцам
  let adminPresnol = [0, 40000, 60000, 80000, 80000, 120000, 120000, 120000, 120000, 120000, 120000, 120000]
  // бюджет на маркетинг начиная с 40 месяца
  let marketingBudget = [0, 0, 0, 50000, 50000, 100000, 100000, 100000, 100000, 100000, 100000, 100000, 100000, 100000, 100000]
  // роялти процент начиная с 4го месяца
  //let royalty = [0, 0, 0, 10, 9, 8, 7, 7, 7, 6, 5, 5]
  let royalty = [0, 0, 0, 0.1, 0.09, 0.08, 0.07, 0.07, 0.07, 0.06, 0.05, 0.05]
  money -= 500000
  let objectAvgCheck = 250000 // средний чек объекта, сказали что 250к, в экселе 300к
  let objectIncome = 100000 // средний доход с одного объекта в мес
  let profit = 0
  let totalObjectsCount = 0
  let totalIncome = 0
  let royaltyBonus = 0
  // формат 1 : { new: 2, inWork: 2 }
  let objectsInWork = { }
  for(let i = 1; i <= 12; i++) {
    // вычислим сколько объектов можно взять в этом месяце
    let objectsToWork = Math.floor(money / objectAvgCheck)
    // не берем больше 12-ти объектов
    if(objectsToWork > 12) objectsToWork = 12
    //money = money - (objectsToWork * objectAvgCheck) + (objectsToWork * objectAvgCheck + 100000)
    //money += objectsToWork * 100000
    // заполним объекты в работе (как в экселе)
    objectsInWork[i] = { new: objectsToWork, inWork: i === 1 ? objectsToWork : objectsInWork[i-1].inWork + objectsToWork}
    // здесь еще начиная с 3го месяца нужно корректировать объекты в работе, старые сливаем
    if(i >= 3) {
      objectsInWork[i].inWork -= objectsInWork[i-2].new
    }
    let monthIncome = objectsInWork[i].inWork * objectIncome
    let monthPureProfit = monthIncome // чистая прибыль месяца
    // вычисляем доход от объектов
    if(i >= 4) {
      //royaltyBonus = monthIncome * ((royalty[i-1] / 100) * 10)
      royaltyBonus = (monthIncome * royalty[i-1]) * 0.4
      money += royaltyBonus, monthPureProfit += royaltyBonus
    }
    monthIncome += royaltyBonus
    totalIncome += monthIncome
    money += monthIncome
    // отнимаем Оплата труда Административного преснола
    money -= adminPresnol[i-1], monthPureProfit -= adminPresnol[i-1]
    // отнимаем зп рабочим
    money -= monthIncome * 0.45, monthPureProfit -= monthIncome * 0.45
    // отнимаем 15к на налоги всегда
    money -= 15000, monthPureProfit -= 15000
    // начиная с 3го месяца отнимаем еще и всегда разные расходы
    if(i >= 3) {
      money -= 47500, monthPureProfit -= 47500
    }
    // в 3й месяц отнимаем за мебель и оборудку 
    if(i === 3) money -= 150000, monthPureProfit -= 150000
    // отнимаем бюджет на маркетинг
    money -= marketingBudget[i-1], monthPureProfit -= marketingBudget[i-1]
    // начиная с 4го месяца учитывпем роялти
    profit += monthPureProfit
    totalObjectsCount += objectsInWork[i].new

    if(idx && i === idx) {
      return {
        totalObjectsCount: totalObjectsCount,
        monthObjects: objectsInWork[i],
        monthIncome: monthIncome,
        totalIncome: totalIncome,
        inbestmentsReturn: money - initialMoney,
        monthPureProfit: monthPureProfit,
        profit: profit,
        royaltyBonus: royaltyBonus
      }
    }
  }
  //totalIncome = money - initialMoney

  const table = document.querySelector('.fr_page_calc table')
  document.querySelector('.fr_page_calc table tr:nth-of-type(2) td:nth-of-type(2)').textContent = totalObjectsCount
  document.querySelector('.fr_page_calc table tr:nth-of-type(3) td:nth-of-type(2)').textContent = totalIncome
  document.querySelector('.fr_page_calc table tr:nth-of-type(4) td:nth-of-type(2)').textContent = profit
  // для 2го года пока подсчет моковый
  document.querySelector('.fr_page_calc table tr:nth-of-type(2) td:nth-of-type(3)').textContent = Math.floor(totalObjectsCount * 1.6)
  document.querySelector('.fr_page_calc table tr:nth-of-type(3) td:nth-of-type(3)').textContent = Math.floor(totalIncome * 1.6)
  document.querySelector('.fr_page_calc table tr:nth-of-type(4) td:nth-of-type(3)').textContent = Math.floor(profit * 1.6)
}
    </script>

@endsection

