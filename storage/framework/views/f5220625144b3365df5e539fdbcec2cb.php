<section class="services">
    <h1 class="section-header hidden"><?php echo e(app()->translate('Наши услуги')); ?></h1>

    <div class="services-div">
            <?php
                $i=0;
            ?>

            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $i++;
            ?>
            <span class="service-banner scroll-hidden">
                <a class="service-banner-link" href="<?php echo e(route('uslugi.index')); ?>/<?php echo e($service->url); ?>/">
                    <img src=" /img/services/<?php echo e($service->src); ?>">
                </a>
                <a href="<?php echo e(route('service.index', $service->url)); ?>" class="service-content">
                    <h4><?php echo e(app()->db_translate($service->title_ru, $service->title_kz)); ?></h4>
                </a>
                <a href="<?php echo e(route('uslugi.index')); ?>/<?php echo e($service->url); ?>/" class="service-banner-button"><p><?php echo e(app()->translate('Подробнее')); ?></p></a>
            </span>
            <?php if($i==4): ?>
                <?php break; ?>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
    <div class="services-link-div">
        <a class="services-link hidden" href="<?php echo e(route('uslugi.index')); ?>/"><?php echo e(app()->translate('Смотреть все')); ?></a>
    </div>
</section>
<?php /**PATH /home/siemens/Documents/Laravel/TestProject/resources/views/blocks/our_services.blade.php ENDPATH**/ ?>