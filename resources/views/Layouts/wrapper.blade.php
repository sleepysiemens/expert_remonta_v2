<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @include('blocks.seo')
    {{--<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/add.css') }}">--}}
    {{--@include('blocks.headScript')--}}
    @vite('resources/css/app.css')
    
    <noscript>
       <style>body{opacity: 1;}</style>
    </noscript>
    @stack('franchise')
    @stack('customStyles')
    @stack('vacancies')
    <script defer src="/js/animation.js"></script>
    <script defer src="/js/contacts.js"></script>
    <script defer src=" /js/bg.js"></script>
    <script defer src=" /js/mobile-menu.js"></script>
    <script defer src=" /js/review.js"></script>
    <link rel="icon" href="/img/favicon/favicon.png">
    {!!$code->head_code!!}
</head>
<body>
    {{--@include('blocks.loader')--}}

    <script src="https://kit.fontawesome.com/0a007e12dc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    @if(session('msg'))
      <div class="success_msg">{{ session('msg') }}</div>
    @endif

    <header>
        <div class="header-div">

            <div style="display: flex" class="site_logo">
                <a class="logo" href="{{ route('main.index') }}">
                    <img src="/svg/logo1.svg" alt="Компания Эксперт Ремонта">
                </a>
            </div>

            <div class="header-subdiv">
              {{--@include('blocks.menu')--}}
              @include('blocks.menu_dynamic')
              
              <div class="header-contact-info-div">
                <a class="header-contact-info" id="city-select" style="cursor: pointer">
                    <span><i class="fas fa-map-marker-alt"></i> {{$usr_city}}</span>
                    <p>{{$tel}}</p>
                    <p></p>
                </a>
                <form method="post" action="{{route('locale.change')}}" class="locale-pc" style="display: flex; margin-left: 20px">
                    {{--@csrf--}}
                    <input type="hidden" name="page" value="{{$page}}">
                    <button class="lang_change">
                        <p>
                        @if(!isset($_COOKIE['locale']) OR $_COOKIE['locale']=='ru') {{'ҚАЗ'}} @php $locale='ru' @endphp @endif
                        @if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz') {{'РУС'}} @php $locale='kz' @endphp @endif
                        </p>
                    </button>
                </form>

                {{--<button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>--}}
                
                <a class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </a>

                {{--@include('blocks.mobile_menu')--}}
                {{--@include('blocks.mobile_menu_dynamic')--}}
                
              </div>
            </div>
        </div>
    </header>
    @include('blocks.mobile_menu_dynamic')
    
    <div class="contacts-right">
        <div class="contacts-wrapper">

        </div>
        <div class="contact-links">

        @if(isset($googlemaps))
        <a href="{{$googlemaps->link}}" target="_blank" class="maps" style="background:#2F8B47"
            aria-label="Адрес компании Эксперт Ремонта на карте">
            <i class="fas fa-map"></i>
            {{--<i class="fas fa-map-marker-alt"></i>--}}
        </a>
        @endif

            <a href="@foreach ($whatsapp as $wp){{$wp->link}}@endforeach" target="_blank" class="whatsapp" aria-label="Номер для связи в WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>

            <a href="@foreach ($telegram as $tg){{$tg->link}}@endforeach" target="_blank" class="telegram" aria-label="Номер для связи в Telegram">
                <i class="fab fa-telegram-plane"></i>
            </a>

            <a href="@foreach ($instagram as $insta){{$insta->link}}@endforeach" target="_blank" class="instagram" aria-label="Наш instagram">
                <i class="fab fa-instagram"></i>
            </a>

            <a href="@foreach ($phone as $ph){{$ph->link}}@endforeach" target="_blank" class="phone" aria-label="Номер телефона компании Эксперт Ремонта">
                <i class="fas fa-phone"></i>
            </a>

        </div>

        <a id="contact-close" class="disabled">
            <i class="fas fa-chevron-up"></i>
        </a>

        <a id="contact-open">
            <i class="far fa-comment"></i>
        </a>
    </div>

    @yield('sale-form')
    @yield('form-div')
    @yield('review-form')

    {{-- @if(!isset($_COOKIE['city']) OR $_COOKIE['city']==NULL){{'page-wrapper-active'}}@endif --}}
    <div id="city-yes-no" class="page-wrapper">
        <div class="sale-form-div">
            <button class="form-sale-close" id="form-city-close"><i class="fas fa-times" aria-hidden="true"></i></button>
            <h3>Выберите город</h3>
            <br>
            <div >
                    <form class="city-form" method="post" action="{{route('city.store')}}">
                        {{--@csrf--}}
                        <input type="hidden" name="page" value="{{$page}}">
                        @foreach($cities as $city)
                        @if(in_array($city->city, ['Астана', 'Алматы']))
                        <button {{--@disabled($usr_city==$city->city)--}} class="city-btn @if($usr_city==$city->city) city-btn-active @endif" name="city" value="{{$city->city}}" ><p style="margin-top: auto">{{$city->city}}</p></button>
                        @endif
                        @endforeach
                        {{--$usr_city--}}

                    </form>
            </div>
            <br>
        </div>
    </div>
    <script>
        $('#form-city-close').on('click', function(){
            $('#city-yes-no').removeClass('page-wrapper-active');
        });

        $('#city-select').on('click', function(){
            $('#city-yes-no').addClass('page-wrapper-active');
        });

    </script>

<div class="parallax">

    <div class="container parallax-layer parallax__layer--base">
<div class="main-content-container @yield('wrapClass')">
    @yield('content')
</div>


    <footer>
            <div class="footer-div">
                <div class="footer-links">
                    <div class="footer-logo">
                        <img src="/img/footerLogo.png" alt="Компания Эксперт Ремонта">
                    </div>
                    <div class="footer-links-subdiv">
                        <a href="{{ route('main.index') }}/" class="footer-link"><p>{{__('Главная')}}</p></a>
                        <a href="{{ route('uslugi.index') }}/" class="footer-link"><p>{{__('Услуги')}}</p></a>
                        <a href="{{ route('price.index') }}/" class="footer-link"><p>{{__('Расценки')}}</p></a>
                        <a href="{{ route('gallery.index') }}/" class="footer-link"><p>{{__('Галерея')}}</p></a>
                        <a href="{{ route('contacts.index') }}/" class="footer-link"><p>{{__('Контакты')}}</p></a>
                    </div>
                </div>
                <div class="footer-contact-info">
                  {{-- @if(isset($_COOKIE['city'])) {{$usr_city}} @else {{config('app.city')}} @endif --}}
                    <div><i class="fas fa-map-marker-alt" aria-hidden="true"></i>{{$usr_city}}</div>
                    {{--<p>+7 (775) 138-50-80</p>--}}
                    <p>{{$tel}}</p>
                </div>
            </div>
        </footer>
    </div>

    <div class="parallax-layer parallax__layer--back" @if($page=='contacts' or $page=='gallery') style="display: none" @endif>
    </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", e => {
    let url = new URL(window.location.href);
    if(url.search.match('from=form')) {
        document.querySelector('body').insertAdjacentHTML('beforeend', `
        <div class="success_msg">Ваша заявка успешно отправлена</div>
        `)
    }

    let success_msg = document.querySelector('.success_msg')
    if(!success_msg) return
    success_msg.classList.add('active');
    setTimeout(() => {
      success_msg.classList.remove('active');
    }, 3000);
  });
</script>
@stack('vacancies_script')
@stack('customScripts')
{{-- скрипт для подстановки csrf токенов в кэшированые страницы
<script>
  let tokens = document.querySelectorAll('input[name="_token"]')
  fetch('/csrf')
  .then(response => response.json())
  .then(csrf => {
    tokens.forEach((token, idx) => {
      tokens[idx].value = csrf
    })
  });
</script>--}}
{!!$code->body_code!!}
</body>
</html>
