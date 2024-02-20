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