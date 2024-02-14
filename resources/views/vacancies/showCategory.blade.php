@extends('Layouts.wrapper')

@section('vacancies')
  nav-link-selected
@endsection

@section('seo-title')
  {{db_translate($vacancyCategory->seo_title_ru, $vacancyCategory->seo_title_kz)}}
@endsection

@section('meta-description')
    {{db_translate($vacancyCategory->meta_desc_ru, $vacancyCategory->meta_desc_kz)}}
@endsection

@push('vacancies')
<link rel="stylesheet" href="{{ asset('/css/ui_kit.css') }}">
<link rel="stylesheet" href="{{ asset('/css/vacancies.css') }}">
@endpush

@section('content')


<div class="vacancies_page vacancy_category">
  <div class="vacancies_page_wrap"><a href="{{route('vacancy.index')}}">< Все вакансии</a></div>
  <div class="vacancies_page_wrap">
    <h1 class="vacancies_page_heading ui_kit_h1_heading">Вакансии в категории {{db_translate($vacancyCategory->name, $vacancyCategory->name_kz)}}</h1>
    <div class="vacancies_page_flex">
      
      <div class="vacancies_page_list">
        @forelse($vacancyCategory->vacancies as $v)
          <x-vacancy-card :v="$v"/>
        {{--<div class="vacancies_page_card">
          <div class="vacancies_page_card_title ui_kit_h3_heading"> <a href="{{route('vacancy.show', $v->url)}}">{{$v->name}}</a></div>
          <div class="vacancies_page_card_salary ui_kit_h3_heading">@if($v->salary_from){{$v->salary_from}}-{{$v->salary_to}} ₸@else зп: по результатам собеседования@endif</div>
          <div class="vacancies_page_card_desc">{{db_translate($v->overview, $v->overview_kz)}}</div>
          <div class="vacancies_page_card_info">{{$v->city->city}}, опыт: {{$v->experience}}</div>
          <div class="vacancies_page_inline_flex">
            <button class="ui_kit_button vacancies_page_button show_form">Откликнуться</button>
            <a class="ui_kit_button ui_kit_button_v2 vacancies_page_button" data-phone="{{$v->phone}}"> Показать телефон</a>
          </div>
        </div>--}}
        @empty <p>Пока нет вакансий в этой категории</p>
        @endforelse
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
    document.addEventListener('click', function(e) {
        if(e.target.classList.contains('ui_kit_button_v2')) {
          setTimeout(() => {
            //e.target.textContent = e.target.dataset.phone
            e.target.innerHTML = e.target.dataset.phone
            e.target.setAttribute('href', `tel:${e.target.dataset.phone}`)
          }, 500);
        }
      })
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

