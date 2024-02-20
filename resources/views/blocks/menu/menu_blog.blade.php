<div class="header_menu_item has_childs">
    <a href="{{ route('uslugi.index') }}/" class="nav-link @yield('service')">{{__('Блог')}}</a>
    <ul class="header_submenu">
    @foreach($blogCategories as $c)
      <li @class(['has_childs' => count($c->childs) > 0])>
        <a href="{{route('blog.category', ['category' => $c->url])}}" class="nav-link">{{db_translate($c->name, $c->name_kz)}}</a>
        <ul class="header_deepmenu">
          @foreach($c->childs as $child)
          <li @class(['has_childs' => count($child->childs) > 0])>
            <a href="{{route('blog.subCategory', ['category' => $c->url, 'child' => $child->url])}}" class="nav-link">
              {{db_translate($child->name, $child->name_kz)}}
            </a>
            <ul class="header_deepmenu">
            @foreach($child->childs as $deepChild)
            <li>
                <a href="{{route('blog.deepCategory', ['category' => $c->url, 'child' => $child->url, 'child2' => $deepChild->url])}}" class="nav-link">
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