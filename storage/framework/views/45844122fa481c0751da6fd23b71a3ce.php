<section class="services-page">
    <h1 class="section-header"><?php echo e(app()->translate('Категории')); ?></h1>
    <br>
    <div class="services-div">

        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <span class="service-banner">
            <a class="service-banner-link" href="<?php echo e(route('category.index', [$category->service_url, $category->url])); ?>">
                <img src=" /img/categories/<?php echo e($category->src); ?>">
            </a>
            <a href="<?php echo e(route('category.index', [$category->service_url, $category->url])); ?>" class="category-content">
                <h4><?php echo e(app()->db_translate($category->title_ru, $category->title_kz)); ?></h4>
            </a>
            <a class="service-banner-button" href="<?php echo e(route('category.index', [$category->service_url, $category->url])); ?>"><p><?php echo e(app()->translate('Подробнее')); ?></p></a>
        </span>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/categories.blade.php ENDPATH**/ ?>