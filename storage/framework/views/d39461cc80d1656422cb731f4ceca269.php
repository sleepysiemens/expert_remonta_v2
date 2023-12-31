<section class="services-page">
    <h1 class="section-header">Галерея</h1>
    <br>
    <div class="services-div" style="min-height: 120vh">
        <?php
            $i=0;
        ?>

        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php
            $i++;
        ?>

        <span class="service-banner" id="item_<?php echo e($i); ?>">
            <a class="close_<?php echo e($i); ?> close"><i class="fas fa-times"></i></a>
            <a class="service-banner-link item_<?php echo e($i); ?>">
                <img alt="<?php echo e(app()->db_translate($gallery->title_ru, $gallery->title_kz)); ?>" src=" /img/gallery/<?php echo e($gallery->src); ?>">
            </a>
        </span>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</section>

<script>
    for(let i=1; i<=<?php echo e($i); ?>;i++)
    {
        $('.item_'+i).on('click', function()
        {
            $('#item_'+i).addClass('fullscreen');
            $('.item_'+i).addClass('close_'+i);
            $('.item_'+i).removeClass('item_'+i);
        });

        $('.close_'+i).on('click', function()
        {
            $('#item_'+i).removeClass('fullscreen');
            $('.close_'+i).addClass('item_'+i);
            $('.close_'+i).removeClass('close_'+i);
        });
    }
</script>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/gallery.blade.php ENDPATH**/ ?>