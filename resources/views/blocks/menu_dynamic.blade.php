<div class="nav-links">
    <div class="header_menu_item">
      <a href="/" @class(['nav-link', 'nav-link-selected' => '/' === $uri])>{{__('Главная')}}</a>
    </div>
    
    @include('blocks.menu.menu_services')
    {{--@include('blocks.menu.menu_blog')--}}
    
    @foreach($menu as $m)
      <div @class([
        'header_menu_item', 'has_childs' => count($m->childs) > 0, 
        'active' => $m->uri === $uri && $m->url !== '#'
        ])>
      <a href="/{{$m->url}}" @class(['nav-link', 'nav-link-selected' => $m->uri === $uri && $m->url !== '#',])>{{db_translate($m->title, $m->title_kz)}}</a>
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