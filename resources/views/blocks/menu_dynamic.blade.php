<div class="nav-links">
    <div class="header_menu_item">
      <a href="/" @class(['nav-link', 'nav-link-selected' => '/' === $uri])>{{__('Главная')}}</a>
    </div>
    <div class="header_menu_item has_childs">
      <a href="{{ route('uslugi.index') }}/" class="nav-link @yield('service')">{{__('Услуги')}}</a>
      <ul class="header_submenu">
      @foreach($services as $s)
        <li class="has_childs">
          <a href="{{route('service.index', ['service' => $s->url])}}" class="nav-link">{{db_translate($s->title_ru, $s->title_kz)}}</a>
          <ul class="header_deepmenu">
            @foreach($s->categories as $c)
            <li>
              <a href="{{route('category.index', ['service' => $s->url, 'category' => $c->url])}}" class="nav-link">
                {{db_translate($c->title_ru, $c->title_kz)}}
              </a>
            </li>
            @endforeach
          </ul>
        </li>
      @endforeach
      </ul>
    </div>
    {{--<div class="header_menu_item"><a href="{{ route('price.index') }}/" class="nav-link @yield('price')">{{__('Расценки')}}</a></div>
    <div class="header_menu_item"><a href="{{ route('gallery.index') }}/" class="nav-link @yield('gallery')">{{__('Галерея')}}</a></div>
    <div class="header_menu_item"><a href="{{ route('reviews.index') }}/" class="nav-link @yield('reviews')">{{__('Отзывы')}}</a></div>
    <div class="header_menu_item"><a href="{{ route('contacts.index') }}/" class="nav-link @yield('contact')">{{__('Контакты')}}</a></div>
    <div class="header_menu_item"><a href="{{ route('main.franchise') }}/" class="nav-link @yield('franchise')">{{__('Франшиза')}}</a></div>
    <div class="header_menu_item has_childs"><a href="{{ route('vacancy.index') }}/" class="nav-link @yield('vacancies')">{{__('Вакансии')}}</a>
      <ul class="header_submenu">
        <li><a href="/vacancies-office" class="nav-link">@lang('В офис')</a></li>
        <li><a href="/vacancies-objects" class="nav-link">@lang('На объекты')</a></li>
      </ul>
    </div>--}}
    @foreach($menu as $m)
      <div class="header_menu_item {{count($m->childs) > 0 ? 'has_childs' : ''}} {{$m->uri === $uri ? 'active' : ''}}">
      <a href="/{{$m->url}}" @class(['nav-link', 'nav-link-selected' => $m->uri === $uri,])>{{db_translate($m->title, $m->title_kz)}}</a>
        @if(count($m->childs) > 0)
        <ul class="header_submenu">
          @foreach($m->childs as $child)
            <li @class(['active' => $child->uri === $uri])>
              <a href="/{{$child->url}}" class="nav-link {{$child->uri === $uri ? 'nav-link-selected' : ''}}"><p>{{db_translate($child->title, $child->title_kz)}}</p></a>
            </li>
          @endforeach
        </ul>
      @endif
      </div> 
    @endforeach
    
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