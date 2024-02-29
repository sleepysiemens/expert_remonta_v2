<div class="header_menu_item has_childs">
  <a href="{{ route('blog.index') }}/" class="nav-link @yield('blog')">{{__('Блог')}}</a>
  <ul class="header_submenu">
  @foreach($blogCategories as $c)
    <li>
      <a href="{{route('blog.category', ['category' => $c->url])}}" class="nav-link">{{db_translate($c->name, $c->name_kz)}}</a>
    </li>
  @endforeach
  </ul>
</div>