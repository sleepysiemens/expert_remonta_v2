<div class="nav-links">
  {{--
    <a href="{{ route('main.index') }}/" class="nav-link @yield('main')"><p>{{app()->translate('Главная')}}</p></a>
    <a href="{{ route('uslugi.index') }}/" class="nav-link @yield('service')"><p>{{app()->translate('Услуги')}}</p></a>
    <a href="{{ route('price.index') }}/" class="nav-link @yield('price')"><p>{{app()->translate('Расценки')}}</p></a>
    <a href="{{ route('gallery.index') }}/" class="nav-link @yield('gallery')"><p>{{app()->translate('Галерея')}}</p></a>
    <a href="{{ route('reviews.index') }}/" class="nav-link @yield('reviews')"><p>{{app()->translate('Отзывы')}}</p></a>
    <a href="{{ route('contacts.index') }}/" class="nav-link @yield('contact')"><p>{{app()->translate('Контакты')}}</p></a>
    --}}
    {{-- @yield('active_nav_class') --}}
    <div class="header_menu_item">
      <a href="/" @class(['nav-link', 'nav-link-selected' => '/' === $uri])>{{app()->translate('Главная')}}</a>
    </div>
    <div class="header_menu_item has_childs">
      <a href="{{ route('uslugi.index') }}/" class="nav-link @yield('service')">{{app()->translate('Услуги')}}</a>
      <ul class="header_submenu">
      @foreach($services as $s)
        <li class="has_childs">
          <a href="{{route('service.index', ['service' => $s->url])}}" class="nav-link">{{app()->db_translate($s->title_ru, $s->title_kz)}}</a>
          <ul class="header_deepmenu">
            @foreach($s->categories as $c)
            <li>
              <a href="{{route('category.index', ['service' => $s->url, 'category' => $c->url])}}" class="nav-link">
                {{app()->db_translate($c->title_ru, $c->title_kz)}}
              </a>
            </li>
            @endforeach
          </ul>
        </li>
      @endforeach
      </ul>
    </div>
    <div class="header_menu_item"><a href="{{ route('price.index') }}/" class="nav-link @yield('price')">{{app()->translate('Расценки')}}</a></div>
    <div class="header_menu_item"><a href="{{ route('gallery.index') }}/" class="nav-link @yield('gallery')">{{app()->translate('Галерея')}}</a></div>
    <div class="header_menu_item"><a href="{{ route('reviews.index') }}/" class="nav-link @yield('reviews')">{{app()->translate('Отзывы')}}</a></div>
    <div class="header_menu_item"><a href="{{ route('contacts.index') }}/" class="nav-link @yield('contact')">{{app()->translate('Контакты')}}</a></div>
    <div class="header_menu_item"><a href="{{ route('main.franchise') }}/" class="nav-link @yield('franchise')">{{app()->translate('Франшиза')}}</a></div>
    <div class="header_menu_item has_childs"><a href="{{ route('vacancy.index') }}/" class="nav-link @yield('vacancies')">{{app()->translate('Вакансии')}}</a>
      <ul class="header_submenu">
        <li><a href="/vacancies-office" class="nav-link">@lang('В офис')</a></li>
        <li><a href="/vacancies-objects" class="nav-link">@lang('На объекты')</a></li>
      </ul>
    </div>
    
</div>

@push('customScripts')
<script>
  document.addEventListener('DOMContentLoaded', function(e) {
    //let navLinks = document.querySelector('.nav-links')
    //console.log(window.innerWidth)
    if(window.innerWidth < 768) return;
    function toggleMenu(e, show = true) {
      let target = e.target.classList.contains('nav-link') ? e.target.parentNode : e.target
      let submenu = target.querySelector('ul.header_submenu')
      if(!submenu) return
      show ? submenu.classList.add('active') : submenu.classList.remove('active')
    }
    let itemsWithSubmenus = document.querySelectorAll('.header_menu_item.has_childs')
    itemsWithSubmenus.forEach(item => {
      item.addEventListener('mouseover', e => toggleMenu(e, true))
      item.addEventListener('mouseout', e => toggleMenu(e, false))
    })
    let submenus = document.querySelectorAll('ul.header_submenu')
    submenus.forEach(submenu => {
      let submenusItemsWithChilds = submenu.querySelectorAll('li.has_childs')
      submenusItemsWithChilds.forEach(item => {
        item.addEventListener('mouseover', function(e) {
          item.querySelector('.header_deepmenu').classList.add('active')
        })
        item.addEventListener('mouseout', function(e) {
          item.querySelector('.header_deepmenu').classList.remove('active')
        })
      })
      submenu.addEventListener('mouseover', function(e) {
        submenu.classList.add('active')
      })
      submenu.addEventListener('mouseout', function(e) {
        submenu.classList.remove('active')
      })
    })
  })
</script>

@endPush