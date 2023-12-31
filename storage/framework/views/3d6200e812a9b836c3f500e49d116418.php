<section class="path">
    <p><a href="<?php echo e(route('main.index')); ?>/"><?php echo e(app()->translate('Главная')); ?></a> / <a href="<?php echo e(route('uslugi.index')); ?>/"><?php echo e(app()->translate('Услуги')); ?></a> / <a href="<?php echo e(route('service.index', $service->url)); ?>"><?php echo e(app()->db_translate($service->title_ru,$service->title_kz)); ?></a></p>
</section>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/path-service.blade.php ENDPATH**/ ?>