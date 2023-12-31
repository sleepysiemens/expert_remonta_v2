<section class="welcome">
    
    <img class="welcome-bg"  src="/img/services/<?php echo e($service->src); ?>">

            <div class="welcome-content">
                <div class="welcome-header hidden">
                    <?php $__currentLoopData = $Headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h1><?php echo e(app()->db_translate($Header->title_ru,$Header->title_kz)); ?></h1>
                        <h3><?php echo e(app()->db_translate($Header->subtitle_ru,$Header->subtitle_kz)); ?></h3>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="welcome-cards">
                    <?php
                        $i=1;
                    ?>
                    <?php $__currentLoopData = $WelcomeCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="welcome-card welcome-card-<?php echo e($i++); ?> scroll-hidden">
                            <p><?php echo e(app()->db_translate($Header->title_ru,$Header->title_kz)); ?></p>
                            <img src=" /img/cards/<?php echo e($card->src); ?>">
                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>

<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/welcome-service.blade.php ENDPATH**/ ?>