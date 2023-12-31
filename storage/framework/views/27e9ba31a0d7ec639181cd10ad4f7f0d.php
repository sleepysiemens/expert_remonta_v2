<section class="services-page">
    <h1 class="section-header"><?php echo e(app()->translate('Услуги')); ?></h1>
    <br>
    <div class="services-div">

        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <span class="service-banner">
            <a class="service-banner-link" href="<?php echo e(route('service.index', $service->url)); ?>">
                <img src=" /img/services/<?php echo e($service->src); ?>">
            </a>
            <a href="<?php echo e(route('service.index', $service->url)); ?>" class="service-content">
                <h4><?php echo e(app()->db_translate($service->title_ru,$service->title_kz)); ?></h4>
            </a>
            <a class="service-banner-button" href="<?php echo e(route('service.index', $service->url)); ?>"><p><?php echo e(app()->translate('Подробнее')); ?></p></a>
        </span>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/services.blade.php ENDPATH**/ ?>