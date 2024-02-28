<div class="mobile-menu">
  <div class="menu-header">
      <a class="mobile-close-btn">
          <i class="fas fa-times"></i>
      </a>
  </div>
  {{--<form method="post" action="{{asset(route('locale.change'))}}"  style="display: flex; margin-left: 20px;transform: translate(10px, -140px);">
    @csrf
    <input type="hidden" name="page" value="{{$page}}">
    <button class="lang_change">
        <p>
            @if(!isset($_COOKIE['locale']) OR $_COOKIE['locale']=='ru') {{'ҚАЗ'}} @php $locale='ru' @endphp @endif
            @if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz') {{'РУС'}} @php $locale='kz' @endphp @endif
        </p>
    </button>
</form>--}}

<div class="header_menu_item">
  <a href="/" @class(['nav-link', 'nav-link-selected' => '/' === $uri])>{{__('Главная')}}</a>
</div>
{{--<div class="header_menu_item has_childs">
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
</div>--}}
@include('blocks.menu.menu_services')
    @if(count($blogCategories) > 0)
    @include('blocks.menu.menu_blog')
    @endif

@foreach($menu as $m)
      <div @class([
        'header_menu_item', 'has_childs' => count($m->childs) > 0, 
        'active' => $m->uri === $uri && $m->url !== '#'
        ])>
      <a href="{{$m->url !== '#' ? "/$m->url" : $m->url}}" @class(['nav-link', 'nav-link-selected' => $m->uri === $uri && $m->url !== '#',])>{{db_translate($m->title, $m->title_kz)}}</a>
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
      //let submenusItemsWithChilds = submenu.querySelectorAll('li.has_childs')
      let submenusItemsWithChilds = submenu.querySelectorAll('li.has_childs.sub')
      submenusItemsWithChilds.forEach(item => {
        item.addEventListener('click', function(e) {
          //console.log(e.target)
          // если клик по вложенному пункту, раскрываем ток его
          if(e.target.classList.contains('deep')) {
            let deepMenu = e.target.querySelector('.header_deepmenu')
            !deepMenu.classList.contains('active') 
            ? deepMenu.classList.add('active')
            : deepMenu.classList.remove('active')
            return
          }
          let deepMenu = item.querySelector('.header_deepmenu')
          !deepMenu.classList.contains('active') 
          ? deepMenu.classList.add('active')
          : deepMenu.classList.remove('active')
        })
      })
    })
  })
</script>

@endPush