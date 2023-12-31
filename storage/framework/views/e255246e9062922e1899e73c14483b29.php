<section class="welcome welcome-slider">
    <?php $cnt=0; ?>
        <?php $__currentLoopData = $CategoryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $CategoryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $cnt++; ?>
            <img class="welcome-bg <?php if($cnt==1): ?> slide-active <?php endif; ?>" id="slide_<?php echo e($cnt); ?>" src="/img/category_slider/<?php echo e($CategoryImage->category_id); ?>/<?php echo e($CategoryImage->src); ?>">
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <p><?php echo e(app()->db_translate($card->title_ru,$card->title_kz)); ?></p>
                            <img src=" /img/cards/<?php echo e($card->src); ?>">
                        </span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
</section>

<script>
    let i=1;

    function incr()
    {
        if(i==<?php echo e($cnt); ?>)
            i=1;
        else
            i++;
    }

    function next_slide()
    {
        $('#slide_'+i).removeClass('slide-active');
        incr();
        $('#slide_'+i).addClass('slide-active');
        setTimeout(next_slide, 3500);
    }

    setTimeout(next_slide, 3500);
</script>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/welcome-category.blade.php ENDPATH**/ ?>