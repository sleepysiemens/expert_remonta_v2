<div class="header_menu_item has_childs">
    <a href="{{ route('blog.index') }}/" class="nav-link @yield('blog')">{{__('Блог')}}</a>
    <ul class="header_submenu">
    @foreach($blogCategories as $c)
      <li @class(['sub', 'has_childs' => count($c->childs) > 0])>
        <a href="{{route('blog.category', ['category' => $c->url])}}" class="nav-link">{{db_translate($c->name, $c->name_kz)}}</a>
        <ul class="header_deepmenu">
          @foreach($c->childs as $child)
          <li @class(['deep', 'has_childs' => count($child->childs) > 0])>
            <a href="{{route('blog.category', ['category' => $c->url, 'child' => $child->url])}}" class="nav-link">
              {{db_translate($child->name, $child->name_kz)}}
            </a>
            <ul class="header_deepmenu">
            @foreach($child->childs as $deepChild)
            <li>
                <a href="{{route('blog.category', ['category' => $c->url, 'child' => $child->url, 'child2' => $deepChild->url])}}" class="nav-link">
                  {{db_translate($deepChild->name, $deepChild->name_kz)}}
                </a>
            </li>
            @endForeach
            </ul>
          </li>
          @endforeach
        </ul>
      </li>
    @endforeach
    </ul>
  </div>