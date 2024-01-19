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
      <a href="/" @class(['nav-link', 'nav-link-selected' => '/' === $uri])>Главная</a>
    </div>
    @foreach($menu as $m)
      <div class="header_menu_item {{count($m->childs) > 0 ? 'has_childs' : ''}} {{$m->uri === $uri ? 'active' : ''}}">
      <a href="/{{$m->url}}" @class(['nav-link', 'nav-link-selected' => $m->uri === $uri,])>{{app()->translate($m->title)}}</a>
        @if(count($m->childs) > 0)
        <ul class="header_submenu">
          @foreach($m->childs as $child)
            <li @class(['has_childs' => count($child->childs), 'active' => $child->uri === $uri])>
              <a href="/{{$child->url}}" class="nav-link {{$child->uri === $uri ? 'nav-link-selected' : ''}}"><p>{{app()->translate($child->title)}}</p></a>
              @if(count($child->childs) > 0)
                <ul class="header_deepmenu">
                  @foreach($child->childs as $child)
                  <li>
                    <a href="/{{$child->url}}" class="nav-link">{{app()->translate($child->title)}}</a>
                  </li>
                  @endforeach
                </ul>
              @endif
            </li>
          @endforeach
        </ul>
      @endif
      </div>
      
      @endforeach
</div>

<script>
  document.addEventListener('DOMContentLoaded', function(e) {
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