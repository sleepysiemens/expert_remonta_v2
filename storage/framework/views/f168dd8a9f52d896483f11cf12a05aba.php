<section class="why">
    <h1 class="section-header">Почему мы?</h1>
    <div class="why-div">
        <?php
            $why_cnt=1;
        ?>
        <?php $__currentLoopData = $WhyCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <span class="why-banner hidden">
            <span class="why-banner-number"><?php echo e($why_cnt); ?></span>
            <h4><?php echo e(app()->db_translate($card->title_ru, $card->title_kz)); ?></h4>
            <p><?php echo e(app()->db_translate($card->subtitle_ru, $card->subtitle_kz)); ?></p>
        </span>
            <?php
                $why_cnt++;
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/why.blade.php ENDPATH**/ ?>