@extends('Layouts.wrapper')

@section('vacancies')
  nav-link-selected
@endsection

@section('seo-title')
Вакансии "Эксперт Ремонта"
@endsection

@push('vacancies')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<link rel="stylesheet" href="{{ asset('/css/ui_kit.css') }}">
<link rel="stylesheet" href="{{ asset('/css/vacancies.css') }}">
@endpush

@section('content')


<div class="vacancies_page">
  <div class="vacancies_page_wrap">
    <h1 class="vacancies_page_heading ui_kit_h1_heading">Вакансии «Эксперт Ремонта»</h1>
    <div class="vacancies_page_flex">
      <div class="vacancies_page_search">
        <div class="vacancies_page_search_heading ui_kit_h3_heading">Подберите вакансию:</div>
        <form action=""> 
          <div class="vacancies_page_input">
            <label for="city_select">Город</label>
            <select name="city_select" id="city_select"> 
              @foreach($cities as $city)
              <option value="{{$city->id}}">{{$city->city}} </option>
              @endforeach
            </select>
          </div>
          <div class="vacancies_page_input">
            <label for="category_select">Направление</label>
            <select name="category_select" id="category_select"> 
              @foreach($vacancyCategories as $cat)
              <option value="{{$cat->id}}">{{$cat->name}} </option>
              @endforeach
            </select>
          </div>
          <div class="vacancies_page_input">
            <label for="exp_select">Опыт</label>
            <select name="exp_select" id="exp_select"> 
              @foreach(['Не имеет значение', '1-3 года', '4-6 лет'] as $v)
              <option value="{{$v}}">{{$v}}</option>
              @endforeach
            </select>
          </div>
          <button class="ui_kit_button vacancies_page_button">Посмотреть</button>
        </form>
      </div>
      <div class="vacancies_page_list">
        @foreach($vacancies as $v)
        <div class="vacancies_page_card">
          <div class="vacancies_page_card_title ui_kit_h3_heading"> <a href="{{route('vacancy.show', $v->id)}}">{{$v->name}}</a></div>
          <div class="vacancies_page_card_salary ui_kit_h3_heading">{{$v->salary_from}}-{{$v->salary_to}} ₸ </div>
          <div class="vacancies_page_card_desc">Покраска, лакирование поверхности, подготовка поверхности под покраску; выполнение работ по оштукатуриванию поверхности, ремонту штукатурки; нанесение защитного покрытия поверхности специальными растворами, жидкостями, смесями;</div>
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
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const options = {
        itemSelectText: '',
      }
      const element = document.querySelector('#city_select');
      const choices = new Choices(element, options);

      const select2 = new Choices('#category_select', options);
      const select3 = new Choices('#exp_select', options);

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
    $('.show_form').on('click', function()
    {
        $('#main-form').addClass('page-wrapper-active');
    });

    $('#main-form-close').on('click', function()
    {
        $('#main-form').removeClass('page-wrapper-active');
    });
</script>
@endpush

