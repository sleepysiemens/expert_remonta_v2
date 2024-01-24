@extends('Layouts.wrapper')

{{--@section('vacancies')
  nav-link-selected
@endsection--}}

@section('seo-title')
Вакансия {{$vacancy->name}}
@endsection

@push('vacancies')
<link rel="stylesheet" href="{{ asset('/css/ui_kit.css') }}">
<link rel="stylesheet" href="{{ asset('/css/vacancy.css') }}">
@endpush

@section('content')

<div class="vacancy_page">
  <div class="vacancy_page_wrap"><a href="{{route('vacancy.index')}}">< Все вакансии</a></div>
  <div class="vacancy_page_hero">
    <div class="vacancy_page_wrap">
      <h1 class="vacancy_page_vacancy_title ui_kit_h2_heading">{{$vacancy->name}}</h1>
      <div class="vacancy_page_vacancy_salary ui_kit_h2_heading">{{$vacancy->salary_from}}-{{$vacancy->salary_to}} ₸ </div>
      <p class="vacancy_page_info">Город: {{$vacancy->city->city}}</p>
      <p class="vacancy_page_info">Требуемый опыт работы: {{$vacancy->experience}}</p>
      <p class="vacancy_page_info">{{$vacancy->employment_type}} занятость</p>
      <div class="vacancies_page_inline_flex">
      <button class="ui_kit_button vacancies_page_button show_form">Откликнуться</button>
      <a class="ui_kit_button ui_kit_button_v2 vacancies_page_button vacancies_page_button_v2" data-phone="{{$vacancy->phone}}"> Показать телефон</a>
      </div>
    </div>
  </div>
</div>
<div class="vacancy_page_content"> 
  <div class="vacancy_page_wrap">
    <h2 class="vacancy_page_subtitle ui_kit_h2_heading">Что нужно делать:</h2>
    {!!$vacancy->overview!!}
    <h2 class="vacancy_page_subtitle ui_kit_h2_heading">Мы предлагаем:</h2>
    {!!$vacancy->offers!!}
    <h2 class="vacancy_page_subtitle ui_kit_h2_heading">Требования:</h2>
    {!!$vacancy->requirements!!}

    <div class="vacancies_page_inline_flex">
    <button class="ui_kit_button vacancies_page_button show_form">Откликнуться</button>
    <a class="ui_kit_button ui_kit_button_v2 vacancies_page_button" data-phone="{{$vacancy->phone}}"> Показать телефон</a>
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

      document.addEventListener('click', function(e) {
        if(e.target.classList.contains('ui_kit_button_v2')) {
          setTimeout(() => {
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

