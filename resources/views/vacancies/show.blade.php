@extends('Layouts.wrapper')

{{--@section('vacancies')
  nav-link-selected
@endsection--}}

@section('seo-title')
  {{db_translate($vacancy->seo_title_ru, $vacancy->seo_title_kz)}}
@endsection

@section('meta-description')
    {{db_translate($vacancy->meta_desc_ru, $vacancy->meta_desc_kz)}}
@endsection

@push('vacancies')
{{--<link rel="stylesheet" href="{{ asset('/css/ui_kit.css') }}">
<link rel="stylesheet" href="{{ asset('/css/vacancy.css') }}">--}}
@vite('resources/css/vacancy.css')
@endpush

@section('content')

<div class="vacancy_page">
  <div class="vacancy_page_wrap"><a href="{{route('vacancy.index')}}">< @lang('Все вакансии')</a></div>
  <div class="vacancy_page_hero">
    <div class="vacancy_page_wrap">
      <h1 class="vacancy_page_vacancy_title ui_kit_h2_heading">{{db_translate($vacancy->name, $vacancy->name_kz)}}</h1>
      <div class="vacancy_page_vacancy_salary ui_kit_h2_heading">@if($vacancy->salary_from){{$vacancy->salary_from}}-{{$vacancy->salary_to}} ₸@else @lang('зп: по результатам собеседования')@endif </div>
      <p class="vacancy_page_info">@lang('Город'): {{$vacancy->city->city}}</p>
      {{--<p class="vacancy_page_info">@lang('Требуемый опыт работы'): @lang($vacancy->experience)</p>--}}
      <p class="vacancy_page_info">@lang("$vacancy->employment_type занятость")</p>
      <div class="vacancies_page_inline_flex">
      <button class="ui_kit_button vacancies_page_button show_form">@lang('Откликнуться')</button>
      <a class="ui_kit_button ui_kit_button_v2 vacancies_page_button vacancies_page_button_v2" data-phone="{{$vacancy->phone}}">@lang('Показать телефон')</a>
      </div>
    </div>
  </div>
</div>
<div class="vacancy_page_content"> 
  <div class="vacancy_page_wrap">
    <h2 class="vacancy_page_subtitle ui_kit_h2_heading">@lang('Что нужно делать'):</h2>
    {!!db_translate($vacancy->overview, $vacancy->overview_kz)!!}
    <h2 class="vacancy_page_subtitle ui_kit_h2_heading">@lang('Мы предлагаем'):</h2>
    {!!db_translate($vacancy->offers, $vacancy->offers_kz)!!}
    <h2 class="vacancy_page_subtitle ui_kit_h2_heading">@lang('Требования'):</h2>
    {!!db_translate($vacancy->requirements, $vacancy->requirements_kz)!!}

    <div class="vacancies_page_inline_flex">
    <button class="ui_kit_button vacancies_page_button show_form">@lang('Откликнуться')</button>
    <a class="ui_kit_button ui_kit_button_v2 vacancies_page_button" data-phone="{{$vacancy->phone}}">@lang('Показать телефон')</a>
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
  $('.show_form').on('click', function(e)
  {
    let vacancyTitle = document.querySelector('.vacancy_page_vacancy_title').textContent
      $('#main-form').addClass('page-wrapper-active');
      $('#main-form h3').text(`@lang('Оставьте ваши контакты на вакансию') ${vacancyTitle}`)
  });

  $('#main-form-close').on('click', function()
  {
      $('#main-form').removeClass('page-wrapper-active');
  });
</script>
@endpush

