<div class="mobile-menu">
  <div class="menu-header">
      <a class="mobile-close-btn">
          <i class="fas fa-times"></i>
      </a>
  </div>
  <form method="post" action="{{asset(route('locale.change'))}}"  style="display: flex; margin-left: 20px;transform: translate(10px, -140px);">
    @csrf
    <input type="hidden" name="page" value="{{$page}}">
    <button class="lang_change">
        <p>
            @if(!isset($_COOKIE['locale']) OR $_COOKIE['locale']=='ru') {{'ҚАЗ'}} @php $locale='ru' @endphp @endif
            @if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz') {{'РУС'}} @php $locale='kz' @endphp @endif
        </p>
    </button>
</form>
  {{--<a href="{{ route('main.index') }}/" class="nav-link"><p>{{__('Главная')}}</p></a>
  <a href="{{ route('uslugi.index') }}/" class="nav-link"><p>{{__('Услуги')}}</p></a>
  <a href="{{ route('price.index') }}/" class="nav-link"><p>{{__('Расценки')}}</p></a>
  <a href="{{ route('gallery.index') }}/" class="nav-link"><p>{{__('Галерея')}}</p></a>
  <a href="{{ route('reviews.index') }}/" class="nav-link"><p>{{__('Отзывы')}}</p></a>
  <a href="{{ route('contacts.index') }}/" class="nav-link"><p>{{__('Контакты')}}</p></a>--}}
  <div class="header_menu_item">
    <a href="/" @class(['nav-link', 'nav-link-selected' => '/' === $uri])>{{__('Главная')}}</a>
  </div>
  @foreach($menu as $m)
      <div class="header_menu_item {{count($m->childs) > 0 ? 'has_childs' : ''}} {{$m->uri === $uri ? 'active' : ''}}">
      <a href="/{{$m->url}}" @class(['nav-link', 'nav-link-selected' => $m->uri === $uri,])>{{__($m->title)}}</a>
        @if(count($m->childs) > 0)
        <ul class="header_submenu">
          @foreach($m->childs as $child)
            <li @class(['has_childs' => count($child->childs), 'active' => $child->uri === $uri])>
              <a href="/{{$child->url}}" class="nav-link {{$child->uri === $uri ? 'nav-link-selected' : ''}}">{{__($child->title)}}</a>
              @if(count($child->childs) > 0)
                <ul class="header_deepmenu">
                  @foreach($child->childs as $child)
                  <li>
                    <a href="/{{$child->url}}" class="nav-link">{{__($child->title)}}</a>
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
    if(window.innerWidth > 768) return;
    function toggleMenu(e) {
      let target = e.target.classList.contains('nav-link') ? e.target.parentNode : e.target
      let submenu = target.querySelector('ul.header_submenu')
      if(!submenu) return
      !submenu.classList.contains('active') ? submenu.classList.add('active') : submenu.classList.remove('active')
    }
    let itemsWithSubmenus = document.querySelectorAll('.header_menu_item.has_childs')
    itemsWithSubmenus.forEach(item => {
      item.addEventListener('click', e => toggleMenu(e))
    })
    let submenus = document.querySelectorAll('ul.header_submenu')
    submenus.forEach(submenu => {
      let submenusItemsWithChilds = submenu.querySelectorAll('li.has_childs')
      submenusItemsWithChilds.forEach(item => {
        item.addEventListener('click', function(e) {
          !item.querySelector('.header_deepmenu').classList.contains('active') 
          ? item.querySelector('.header_deepmenu').classList.add('active')
          : item.querySelector('.header_deepmenu').classList.remove('active')
        })
      })
    })
  })
</script>