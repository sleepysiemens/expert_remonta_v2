<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">
            <li class="nav-header">ФИКСИРОВАННЫЕ СТРАНИЦЫ</li>
            <li class="nav-item">

                <li class="nav-item @yield('menu-dropdown')">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-home"></i>
                      <p>
                        Главная
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none; @yield('dropdown')">
                          <li class="nav-item">
                            <a href="{{ route('admin.main.header.index',) }}" class="nav-link @yield('header')">
                              <i class="fas fa-i-cursor nav-icon"></i>
                              <p>Welcome • Заголовок</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('admin.main.welcome_cards.index') }}" class="nav-link @yield('cards')">
                              <i class="far far fa-clone nav-icon"></i>
                              <p>Welcome • карточки</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('admin.main.about.index') }}" class="nav-link @yield('about')">
                              <i class="fas fa-user-check nav-icon"></i>
                              <p>О нас</p>
                            </a>
                          </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.main.main_text.index') }}" class="nav-link @yield('main_text')">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Текст на главной</p>
                            </a>
                        </li>
                          <li class="nav-item" style="border-bottom: 1px solid rgba(255,255,255, .2">
                            <a href="{{ route('admin.main.why_cards.index') }}" class="nav-link @yield('why')">
                              <i class="far fa-question-circle nav-icon"></i>
                              <p>Почему мы?</p>
                            </a>
                          </li>
                    </ul>
                  </li>
                  <li class="nav-item">


                <a href="{{ route('admin.price.index') }}" class="nav-link @yield('price')">
                  <i class="nav-icon fas fa-tags"></i>
                  <p>
                      Расценки
                  </p>
              </a>

                <a href="{{ route('admin.gallery.index') }}" class="nav-link @yield('gallery')">
                    <i class="nav-icon fas fa-images"></i>
                    <p>
                        Галерея
                    </p>
                </a>

                <a href="{{ route('admin.contact.index') }}" class="nav-link @yield('contact')">
                    <i class="nav-icon fas fa-phone"></i>
                    <p>
                        Контакты
                    </p>
                </a>

            </li>
        </ul>
        <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">
            <li class="nav-header">SEO</li>
            <li class="nav-item">

                <a href="{{ route('admin.seo.index') }}" class="nav-link @yield('seo')">
                    <i class="nav-icon fas fa-link"></i>
                    <p>
                        SEO статичных страниц
                    </p>
                </a>
            </li>
        </ul>
        <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">
          <li class="nav-header">БАЗА ДАННЫХ</li>
          <li class="nav-item">

            {{--<a href="{{ route('admin.menu.index') }}" class="nav-link @yield('menu')">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                  Меню
                  <span class="badge badge-info right"></span>
              </p>
          </a>--}}

              <a href="{{ route('admin.review.index') }}" class="nav-link @yield('reviews')">
                  <i class="nav-icon fas fa-star-half-alt"></i>
                  <p>
                      Отзывы
                      <span class="badge badge-info right">{{$reviews->count()}}</span>
                  </p>
              </a>

              <a href="{{ route('admin.faq.index') }}" class="nav-link @yield('faq')">
                  <i class="nav-icon fas fa-question"></i>
                  <p>
                      Вопросы
                      <span class="badge badge-info right">{{$questions->count()}}</span>
                  </p>
              </a>

              <a href="{{ route('admin.service.index') }}" class="nav-link @yield('services')">
                  <i class="nav-icon fas fa-bars"></i>
                  <p>
                      Услуги
                      <span class="badge badge-info right">{{$services->count()}}</span>
                  </p>
              </a>

              <a href="{{ route('admin.page.index') }}" class="nav-link @yield('service_pages')">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Страницы услуг
                    <span class="badge badge-info right">{{$categories->count()}}</span>
                </p>
            </a>

              {{--<a href="{{ route('admin.service_slider.index') }}" class="nav-link @yield('service_slider')">
                  <i class="nav-icon far fa-images"></i>
                  <p>
                      Услуги • Слайдер
                  </p>
              </a>--}}

              <a href="{{ route('admin.blog.index') }}" class="nav-link @yield('blog')">
                <i class="nav-icon fas fa-clipboard-check"></i>
                <p>
                  Статьи
                </p>
              </a>

              <a href="{{ route('admin.sale.index') }}" class="nav-link @yield('sales')">
                  <i class="nav-icon fas fa-percentage"></i>
                  <p>
                      Скидки
                      <span class="badge badge-info right">{{$sales->count()}}</span>
                  </p>
              </a>

              @if(auth()->user()->role == 'admin')

              <li class="nav-item @yield('menu-dropdown')">
                <a href="#" class="nav-link">
                  <i class="nav-icon far fa-address-book"></i>
                  <p>
                    Вакансии
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none; @yield('dropdown')">
                      <li class="nav-item">
                        <a href="{{ route('admin.vacancy.index',) }}" class="nav-link">
                          <i class="nav-icon far fa-address-book"></i>
                          <p>Вакансии • Список</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.vc.index',) }}" class="nav-link">
                          <i class="nav-icon far fa-address-book"></i>
                          <p>Вакансии • Категории вакансий</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ route('admin.vacancy.resumes',) }}" class="nav-link">
                          <i class="nav-icon far fa-address-book"></i>
                          <p>Отклики • Резюме</p>
                        </a>
                      </li>
                </ul>
              </li>

              {{--<a href="{{ route('admin.vacancy.index') }}" class="nav-link @yield('vacancies')">
                <i class="nav-icon far fa-address-book"></i>
                <p>
                    Вакансии
                    <span class="badge badge-info right"></span>
                </p>
            </a>--}}

              @endif

          </li>
      </ul>
          @if(auth()->user()->role == 'admin')
        <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">

          <li class="nav-header">ЗАЯВКИ</li>
            <li class="nav-item">
                <a href="{{ route('admin.new_reviews.index') }}" class="nav-link @yield('new_reviews')">
                    <i class="nav-icon fas fa-star-half-alt"></i>
                    <p>
                        Новые отзывы
                    </p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.application.index') }}" class="nav-link @yield('applications')">
                <i class="nav-icon far fa-address-book"></i>
                <p>
                    Заявки
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.user.index') }}" class="nav-link @yield('users')">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Пользователи
                </p>
              </a>
            </li>
          </li>

        </ul>
       @endif
    </li>

  </nav>
