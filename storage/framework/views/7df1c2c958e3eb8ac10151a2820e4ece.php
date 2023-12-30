<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo $__env->make('blocks.seo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">
    <script defer src="/js/animation.js"></script>
    <script defer src="/js/contacts.js"></script>
    <script defer src=" /js/bg.js"></script>
    <script defer src=" /js/mobile-menu.js"></script>
    <script defer src=" /js/review.js"></script>
    <link rel="icon" href="/img/favicon/favicon.png">
</head>
<body>

    <script src="https://kit.fontawesome.com/0a007e12dc.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <header>
        <div class="header-div">

            <div style="display: flex">
                <a class="logo" href="<?php echo e(route('main.index')); ?>">
                    <img src=" /img/logo.png">
                </a>
            </div>

            <div class="header-subdiv">
                <div class="nav-links">
                    <a href="<?php echo e(route('main.index')); ?>/" class="nav-link <?php echo $__env->yieldContent('main'); ?>"><p><?php echo e(app()->translate('Главная')); ?></p></a>
                    <a href="<?php echo e(route('uslugi.index')); ?>/" class="nav-link <?php echo $__env->yieldContent('service'); ?>"><p><?php echo e(app()->translate('Услуги')); ?></p></a>
                    <a href="<?php echo e(route('price.index')); ?>/" class="nav-link <?php echo $__env->yieldContent('price'); ?>"><p><?php echo e(app()->translate('Расценки')); ?></p></a>
                    <a href="<?php echo e(route('gallery.index')); ?>/" class="nav-link <?php echo $__env->yieldContent('gallery'); ?>"><p><?php echo e(app()->translate('Галерея')); ?></p></a>
                    <a href="<?php echo e(route('reviews.index')); ?>/" class="nav-link <?php echo $__env->yieldContent('reviews'); ?>"><p><?php echo e(app()->translate('Отзывы')); ?></p></a>
                    <a href="<?php echo e(route('contacts.index')); ?>/" class="nav-link <?php echo $__env->yieldContent('contact'); ?>"><p><?php echo e(app()->translate('Контакты')); ?></p></a>
                </div>

                <a class="header-contact-info" id="city-select" style="cursor: pointer">
                    <h1><i class="fas fa-map-marker-alt"></i> <?php if(isset($_COOKIE['city'])): ?> <?php echo e($_COOKIE['city']); ?> <?php else: ?> Астана<?php endif; ?></h1>
                    <p>+7 (775) 138-50-80</p>
                </a>
                <form method="post" action="<?php echo e(asset(route('locale.change'))); ?>" class="locale-pc" style="display: flex; margin-left: 20px">
                    <?php echo csrf_field(); ?>
                    <button class="lang_change">
                        <p>
                        <?php if(!isset($_COOKIE['locale']) OR $_COOKIE['locale']=='ru'): ?> <?php echo e('ҚАЗ'); ?> <?php $locale='ru' ?> <?php endif; ?>
                        <?php if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz'): ?> <?php echo e('РУС'); ?> <?php $locale='kz' ?> <?php endif; ?>
                        </p>
                    </button>
                </form>

                <a class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </a>

                <div class="mobile-menu">
                    <div class="menu-header">
                        <a class="mobile-close-btn">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <a href="<?php echo e(route('main.index')); ?>/" class="nav-link"><p><?php echo e(app()->translate('Главная')); ?></p></a>
                    <a href="<?php echo e(route('uslugi.index')); ?>/" class="nav-link"><p><?php echo e(app()->translate('Услуги')); ?></p></a>
                    <a href="<?php echo e(route('price.index')); ?>/" class="nav-link"><p><?php echo e(app()->translate('Расценки')); ?></p></a>
                    <a href="<?php echo e(route('gallery.index')); ?>/" class="nav-link"><p><?php echo e(app()->translate('Галерея')); ?></p></a>
                    <a href="<?php echo e(route('reviews.index')); ?>/" class="nav-link"><p><?php echo e(app()->translate('Отзывы')); ?></p></a>
                    <a href="<?php echo e(route('contacts.index')); ?>/" class="nav-link"><p><?php echo e(app()->translate('Контакты')); ?></p></a>
                    <br>
                    <form method="post" action="<?php echo e(asset(route('locale.change'))); ?>"  style="display: flex; margin-left: 20px">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="sourse" value="<?php echo e($page); ?>">
                        <button class="lang_change">
                            <p>
                                <?php if(!isset($_COOKIE['locale']) OR $_COOKIE['locale']=='ru'): ?> <?php echo e('ҚАЗs'); ?> <?php $locale='ru' ?> <?php endif; ?>
                                <?php if(isset($_COOKIE['locale']) AND $_COOKIE['locale']=='kz'): ?> <?php echo e('РУСs'); ?> <?php $locale='kz' ?> <?php endif; ?>
                            </p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="contacts-right">
        <div class="contacts-wrapper">

        </div>
        <div class="contact-links">
            <a href="<?php $__currentLoopData = $whatsapp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($wp->link); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" target="_blank" class="whatsapp">
                <i class="fab fa-whatsapp"></i>
            </a>

            <a href="<?php $__currentLoopData = $telegram; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tg->link); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" target="_blank" class="telegram">
                <i class="fab fa-telegram-plane"></i>
            </a>

            <a href="<?php $__currentLoopData = $instagram; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($insta->link); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" target="_blank" class="instagram">
                <i class="fab fa-instagram"></i>
            </a>

            <a href="<?php $__currentLoopData = $phone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($ph->link); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" target="_blank" class="phone">
                <i class="fas fa-phone"></i>
            </a>

        </div>

        <a id="contact-close" class="disabled">
            <i class="fas fa-chevron-up"></i>
        </a>

        <a id="contact-open">
            <i class="far fa-comment"></i>
        </a>
    </div>

    <?php echo $__env->yieldContent('sale-form'); ?>
    <?php echo $__env->yieldContent('form-div'); ?>

    <div id="city-yes-no" class="page-wrapper <?php if(!isset($_COOKIE['city']) OR $_COOKIE['city']==NULL): ?><?php echo e('page-wrapper-active'); ?><?php endif; ?>">
        <div class="sale-form-div">
            <h3>Выберите город</h3>
            <br>
            <div style="width: 90%; margin: auto; justify-content: space-evenly">
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <form style="height: 35px; margin: auto; display: inline-flex; margin: 10px 0; width: 49%; justify-content: center" method="post" action="<?php echo e(route('city.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="city" value="<?php echo e($city->city); ?>">
                        <button class="hidden gradient_button" style="height: 100%" ><p style="margin-top: auto"><?php echo e($city->city); ?></p></button>
                    </form>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <br>
        </div>
    </div>
    <script>
        $('#city-no').on('click', function(){
            $('#city-yes-no').removeClass('page-wrapper-active');
        });
        $('#city-select').on('click', function(){
            $('#city-yes-no').addClass('page-wrapper-active');
        });

    </script>

<div class="parallax">

    <div class="container parallax-layer parallax__layer--base">
<div class="main-content-container">
    <?php echo $__env->yieldContent('content'); ?>
</div>


    <footer>
            <div class="footer-div">
                <div class="footer-links">
                    <div class="footer-logo">
                        <img src="/img/footerLogo.png">
                    </div>
                    <div class="footer-links-subdiv">
                        <a href="<?php echo e(route('main.index')); ?>/" class="footer-link"><p><?php echo e(app()->translate('Главная')); ?></p></a>
                        <a href="<?php echo e(route('uslugi.index')); ?>/" class="footer-link"><p><?php echo e(app()->translate('Услуги')); ?></p></a>
                        <a href="<?php echo e(route('price.index')); ?>/" class="footer-link"><p><?php echo e(app()->translate('Расценки')); ?></p></a>
                        <a href="<?php echo e(route('gallery.index')); ?>/" class="footer-link"><p><?php echo e(app()->translate('Галерея')); ?></p></a>
                        <a href="<?php echo e(route('contacts.index')); ?>/" class="footer-link"><p><?php echo e(app()->translate('Контакты')); ?></p></a>
                    </div>
                </div>
                <div class="footer-contact-info">
                    <h1><i class="fas fa-map-marker-alt" aria-hidden="true"></i><?php if(isset($_COOKIE['city'])): ?> <?php echo e($_COOKIE['city']); ?> <?php else: ?> Астана<?php endif; ?></h1>
                    <p>+7 (775) 138-50-80</p>
                </div>
            </div>
        </footer>
    </div>

    <div class="parallax-layer parallax__layer--back" <?php if($page=='contacts' or $page=='gallery'): ?> style="display: none" <?php endif; ?>>
    </div>
</div>
</body>
</html>
<?php /**PATH /home/siemens/Documents/Laravel/TestProject/resources/views/Layouts/wrapper.blade.php ENDPATH**/ ?>