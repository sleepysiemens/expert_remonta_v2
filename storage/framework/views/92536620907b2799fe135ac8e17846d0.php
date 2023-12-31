<section class="about">
    <?php $__currentLoopData = $Abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $About): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="about-text">
                <h1 class="hidden"><?php echo e(app()->translate('О нас')); ?></h1>
                <p class="hidden">
                    <?php echo e(app()->db_translate($About->title_ru,$About->title_kz)); ?>

                </p>
        </div>
            <div class="about-img hidden">
                <img src=" /img/about/<?php echo e($About->src); ?> ">
            </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </section>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/about_company.blade.php ENDPATH**/ ?>