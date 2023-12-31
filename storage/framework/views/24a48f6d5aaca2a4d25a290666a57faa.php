<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">
            <li class="nav-header">ФИКСИРОВАННЫЕ СТРАНИЦЫ</li>
            <li class="nav-item">

                <li class="nav-item <?php echo $__env->yieldContent('menu-dropdown'); ?>">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-home"></i>
                      <p>
                        Главная
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none; <?php echo $__env->yieldContent('dropdown'); ?>">
                          <li class="nav-item">
                            <a href="<?php echo e(route('admin.main.header.index',)); ?>" class="nav-link <?php echo $__env->yieldContent('header'); ?>">
                              <i class="fas fa-i-cursor nav-icon"></i>
                              <p>Welcome • Заголовок</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo e(route('admin.main.welcome_cards.index')); ?>" class="nav-link <?php echo $__env->yieldContent('cards'); ?>">
                              <i class="far far fa-clone nav-icon"></i>
                              <p>Welcome • карточки</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="<?php echo e(route('admin.main.about.index')); ?>" class="nav-link <?php echo $__env->yieldContent('about'); ?>">
                              <i class="fas fa-user-check nav-icon"></i>
                              <p>О нас</p>
                            </a>
                          </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.main.main_text.index')); ?>" class="nav-link <?php echo $__env->yieldContent('main_text'); ?>">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Текст на главной</p>
                            </a>
                        </li>
                          <li class="nav-item" style="border-bottom: 1px solid rgba(255,255,255, .2">
                            <a href="<?php echo e(route('admin.main.why_cards.index')); ?>" class="nav-link <?php echo $__env->yieldContent('why'); ?>">
                              <i class="far fa-question-circle nav-icon"></i>
                              <p>Почему мы?</p>
                            </a>
                          </li>
                    </ul>
                  </li>
                  <li class="nav-item">


                <a href="<?php echo e(route('admin.price.index')); ?>" class="nav-link <?php echo $__env->yieldContent('price'); ?>">
                  <i class="nav-icon fas fa-tags"></i>
                  <p>
                      Расценки
                  </p>
              </a>

                <a href="<?php echo e(route('admin.gallery.index')); ?>" class="nav-link <?php echo $__env->yieldContent('gallery'); ?>">
                    <i class="nav-icon fas fa-images"></i>
                    <p>
                        Галерея
                    </p>
                </a>

                <a href="<?php echo e(route('admin.contact.index')); ?>" class="nav-link <?php echo $__env->yieldContent('contact'); ?>">
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

                <a href="<?php echo e(route('admin.seo.index')); ?>" class="nav-link <?php echo $__env->yieldContent('seo'); ?>">
                    <i class="nav-icon fas fa-link"></i>
                    <p>
                        SEO
                    </p>
                </a>
            </li>
        </ul>
        <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">
          <li class="nav-header">БАЗА ДАННЫХ</li>
          <li class="nav-item">

              <a href="<?php echo e(route('admin.review.index')); ?>" class="nav-link <?php echo $__env->yieldContent('reviews'); ?>">
                  <i class="nav-icon fas fa-star-half-alt"></i>
                  <p>
                      Отзывы
                      <span class="badge badge-info right"><?php echo e($reviews->count()); ?></span>
                  </p>
              </a>

              <a href="<?php echo e(route('admin.faq.index')); ?>" class="nav-link <?php echo $__env->yieldContent('faq'); ?>">
                  <i class="nav-icon fas fa-question"></i>
                  <p>
                      Вопросы
                      <span class="badge badge-info right"><?php echo e($questions->count()); ?></span>
                  </p>
              </a>

              <a href="<?php echo e(route('admin.service.index')); ?>" class="nav-link <?php echo $__env->yieldContent('services'); ?>">
                  <i class="nav-icon fas fa-bars"></i>
                  <p>
                      Услуги
                      <span class="badge badge-info right"><?php echo e($services->count()); ?></span>
                  </p>
              </a>

              <a href="<?php echo e(route('admin.category.index')); ?>" class="nav-link <?php echo $__env->yieldContent('categories'); ?>">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                      Категории
                      <span class="badge badge-info right"><?php echo e($categories->count()); ?></span>
                  </p>
              </a>

              <a href="<?php echo e(route('admin.category_slider.index')); ?>" class="nav-link <?php echo $__env->yieldContent('category_slider'); ?>">
                <i class="nav-icon far fa-images"></i>
                <p>
                  Категории • Слайдер
                </p>
              </a>

              

              <a href="<?php echo e(route('admin.blog.index')); ?>" class="nav-link <?php echo $__env->yieldContent('blog'); ?>">
                <i class="nav-icon fas fa-clipboard-check"></i>
                <p>
                  Статьи
                </p>
              </a>

              <a href="<?php echo e(route('admin.sale.index')); ?>" class="nav-link <?php echo $__env->yieldContent('sales'); ?>">
                  <i class="nav-icon fas fa-percentage"></i>
                  <p>
                      Скидки
                      <span class="badge badge-info right"><?php echo e($sales->count()); ?></span>
                  </p>
              </a>

          </li>
      </ul>
          <?php if(auth()->user()->role == 'admin'): ?>
        <ul class="nav nav-treeview" style="border-bottom: 1px solid rgba(255,255,255, .2)">

          <li class="nav-header">ЗАЯВКИ</li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.new_reviews.index')); ?>" class="nav-link <?php echo $__env->yieldContent('new_reviews'); ?>">
                    <i class="nav-icon fas fa-star-half-alt"></i>
                    <p>
                        Новые отзывы
                    </p>
                </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('admin.application.index')); ?>" class="nav-link <?php echo $__env->yieldContent('applications'); ?>">
                <i class="nav-icon far fa-address-book"></i>
                <p>
                    Заявки
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo e(route('admin.user.index')); ?>" class="nav-link <?php echo $__env->yieldContent('users'); ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Пользователи
                </p>
              </a>
            </li>
          </li>

        </ul>
       <?php endif; ?>
    </li>

  </nav>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/admin/sidebar.blade.php ENDPATH**/ ?>