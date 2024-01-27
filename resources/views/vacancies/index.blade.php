@extends('Layouts.wrapper')

@section('vacancies')
  nav-link-selected
@endsection

@section('seo-title')
  {{app()->db_translate($seo->seo_ru, $seo->seo_kz)}}
@endsection

@section('meta-description')
  {{app()->db_translate($seo->meta_ru, $seo->meta_kz)}}
@endsection

@push('vacancies')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<link rel="stylesheet" href="{{ asset('/css/ui_kit.css') }}">
<link rel="stylesheet" href="{{ asset('/css/vacancies.css') }}">
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
@endpush

@section('content')


<div class="vacancies_page">
  <div class="vacancies_page_wrap">
    <h1 class="vacancies_page_heading ui_kit_h1_heading">Вакансии «Эксперт Ремонта»</h1>
    @if(isset($requestInfo['city']))
      <p>Применен фильтр. Город: {{$requestInfo['city']->city}}, категория: {{$requestInfo['category']->name}}, опыт: {{$requestInfo['exp']}}</p>
    @endif
    <div class="vacancies_page_flex">
      <div class="vacancies_page_search">
        <div class="vacancies_page_search_heading ui_kit_h3_heading">Подберите вакансию:</div>
        <form action="" method="GET"> 
          <div class="vacancies_page_input">
            <label for="city_select">Город</label>
            <select name="city_select" id="city_select" class="ajax_select"> 
              @foreach($cities as $city)
              <option @selected($city->city === $usr_city) value="{{$city->id}}">{{$city->city}} </option>
              @endforeach
            </select>
          </div>
          <div class="vacancies_page_input">
            <label for="category_select">Направление</label>
            <select name="category_select" id="category_select" class="ajax_select"> 
              @foreach($vacancyCategories as $cat)
              <option value="{{$cat->id}}">{{$cat->name}} </option>
              @endforeach
            </select>
          </div>
          <div class="vacancies_page_input">
            <label for="exp_select">Опыт</label>
            <select name="exp_select" id="exp_select" class="ajax_select"> 
              @foreach(['Не имеет значение', '1-3 года', '4-6 лет'] as $v)
              <option value="{{$v}}">{{$v}}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="ui_kit_button vacancies_page_button vacancies_page_search_button">Посмотреть</button>
        </form>
      </div>
      <div class="vacancies_page_list">
        @foreach($vacancies as $v)
        <div class="vacancies_page_card">
          <div class="vacancies_page_card_title ui_kit_h3_heading"> <a href="{{route('vacancy.show', $v->url)}}">{{$v->name}}</a></div>
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
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection

@section('sale-form')
    @include('blocks.vacancy-form')
@endsection

@push('vacancies_script')
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const options = {
        itemSelectText: '',
      }
      const element = document.querySelector('#city_select');
      const choices = new Choices(element, options);

      const select2 = new Choices('#category_select', options);
      const select3 = new Choices('#exp_select', options);

      let ajaxSelects = document.querySelectorAll('.ajax_select')
      ajaxSelects.forEach((select, idx) => {
        ajaxSelects[idx].addEventListener('change', function(e) {
          let citySelect = document.querySelector('#city_select').value
          let categorySelect = document.querySelector('#category_select').value
          let expSelect = document.querySelector('#exp_select').value
          //console.log(citySelect, categorySelect, expSelect)
          getFilteredItemsCount(citySelect, categorySelect, expSelect)
        })
      })

      function getFilteredItemsCount(cityId, categoryId, exp) {

        fetch('/vacancies/filter?' + new URLSearchParams({
            city_id: cityId,
            category_id: categoryId,
            exp: exp
        })).then(response => {
          response.json().then(res => {
            //console.log(res)
            let button = document.querySelector('.vacancies_page_search_button')
            let info = document.querySelector('.vacancies_page_search_info')
            if(res > 0) {
              if(info) info.style.display = 'none'
              button.textContent = `Посмотреть ${res} вакансии`
              button.style.display = 'block'
              //button.parentNode.setAttribute('action', `/vacancies?city_id=${cityId}&category_id=${categoryId}&exp=${exp}`)
              /*button.parentNode.setAttribute('action', `/vacancies?` + new URLSearchParams({
                city_id: cityId,
                category_id: categoryId,
                exp: exp
            }))*/
            button.parentNode.setAttribute('action', `/vacancies`)
            } else {
              button.style.display = 'none'
              if(!info) button.insertAdjacentHTML('afterend', '<span class="vacancies_page_search_info">Нет доступных вакансий</span>')
              else info.style.display = 'block'
            }
          })
        })
      }

      document.addEventListener('click', function(e) {
        if(e.target.classList.contains('ui_kit_button_v2')) {
          setTimeout(() => {
            //e.target.textContent = e.target.dataset.phone
            e.target.innerHTML = e.target.dataset.phone
            e.target.setAttribute('href', `tel:${e.target.dataset.phone}`)
          }, 500);
        }
      })
    });
    
  </script>
  <script>
    $('.show_form').on('click', function(e)
    {
      //console.log(e.target.parentNode.parentNode.querySelector('.vacancies_page_card_title'))
      let vacancyTitle = e.target.parentNode.parentNode.querySelector('.vacancies_page_card_title').textContent
      //let vacancySalary = e.target.parentNode.parentNode.querySelector('.vacancies_page_card_salary').textContent
        $('#main-form').addClass('page-wrapper-active');
        $('#main-form h3').text(`Оставьте ваши контакты на вакансию ${vacancyTitle}`)
    });

    $('#main-form-close').on('click', function()
    {
        $('#main-form').removeClass('page-wrapper-active');
    });
</script>
@endpush

