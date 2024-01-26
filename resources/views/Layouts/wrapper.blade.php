<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('blocks.seo')
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    @stack('franchise')
    @stack('customStyles')
    @stack('vacancies')
    <script defer src="/js/animation.js"></script>
    <script defer src="/js/contacts.js"></script>
    <script defer src=" /js/bg.js"></script>
    <script defer src=" /js/mobile-menu.js"></script>
    <script defer src=" /js/review.js"></script>
    <link rel="icon" href="/img/favicon/favicon.png">
</head>
<body>

    <script src="https://kit.fontawesome.com/0a007e12dc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    @if(session('msg'))
      <div class="success_msg">{{ session('msg') }}</div>
    @endif

    <header>
        <div class="header-div">

            <div style="display: flex" class="site_logo">
                <a class="logo" href="{{ route('main.index') }}">
                    <img src=" /img/logo.png">
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
                <form method="post" action="{{asset(route('locale.change'))}}" class="locale-pc" style="display: flex; margin-left: 20px">
                    @csrf
                    <input type="hidden" name="page" value="{{$page}}">
                    <button class="lang_change">
                        <p>
                        @if(!isset($_COOKIE['locale']) OR $_COOKIE['locale']=='ru') {{'ҚАЗ'}} @php $locale='ru' @endphp @endif
                        @if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz') {{'РУС'}} @php $locale='kz' @endphp @endif
                        </p>
                    </button>
                </form>

                <a class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </a>

                {{--@include('blocks.mobile_menu')--}}
                @include('blocks.mobile_menu_dynamic')
                
              </div>
            </div>
        </div>
    </header>
    
    <div class="contacts-right">
        <div class="contacts-wrapper">

        </div>
        <div class="contact-links">
            <a href="@foreach ($whatsapp as $wp){{$wp->link}}@endforeach" target="_blank" class="whatsapp">
                <i class="fab fa-whatsapp"></i>
            </a>

            <a href="@foreach ($telegram as $tg){{$tg->link}}@endforeach" target="_blank" class="telegram">
                <i class="fab fa-telegram-plane"></i>
            </a>

            <a href="@foreach ($instagram as $insta){{$insta->link}}@endforeach" target="_blank" class="instagram">
                <i class="fab fa-instagram"></i>
            </a>

            <a href="@foreach ($phone as $ph){{$ph->link}}@endforeach" target="_blank" class="phone">
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
                        @csrf
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
<div class="main-content-container">
    @yield('content')
</div>


    <footer>
            <div class="footer-div">
                <div class="footer-links">
                    <div class="footer-logo">
                        <img src="/img/footerLogo.png">
                    </div>
                    <div class="footer-links-subdiv">
                        <a href="{{ route('main.index') }}/" class="footer-link"><p>{{app()->translate('Главная')}}</p></a>
                        <a href="{{ route('uslugi.index') }}/" class="footer-link"><p>{{app()->translate('Услуги')}}</p></a>
                        <a href="{{ route('price.index') }}/" class="footer-link"><p>{{app()->translate('Расценки')}}</p></a>
                        <a href="{{ route('gallery.index') }}/" class="footer-link"><p>{{app()->translate('Галерея')}}</p></a>
                        <a href="{{ route('contacts.index') }}/" class="footer-link"><p>{{app()->translate('Контакты')}}</p></a>
                    </div>
                </div>
                <div class="footer-contact-info">
                  {{-- @if(isset($_COOKIE['city'])) {{$usr_city}} @else {{env('APP_CITY')}} @endif --}}
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
</body>
</html>
