<?php $__env->startSection('page_title'); ?>
Фото выполненных работ – Эксперт Ремонта
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('blocks.gallery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('gallery'); ?>
nav-link-selected
<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta-description'); ?>
    <?php $__currentLoopData = $seos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e(app()->db_translate($seo->meta_ru, $seo->meta_kz)); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('seo-title'); ?>
    <?php $__currentLoopData = $seos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e(app()->db_translate($seo->seo_ru, $seo->seo_kz)); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.wrapper', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/gallery/index.blade.php ENDPATH**/ ?>