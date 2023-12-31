<section class="about-service">
    <div class="about-with-button">
        <h1><?php echo e(app()->db_translate($category->title_ru, $category->title_kz)); ?></h1>
        <a class="gradient_button" id="main-form-btn"><span class="flare"></span><p><?php echo e(app()->translate('Заказать услугу')); ?></p></a>
    </div>
    <p>
        <?php echo e(app()->db_translate($category->description_ru, $category->description_kz)); ?>

    </p>
</section>

<script>
    $('#main-form-btn').on('click', function()
    {
        $('#main-form').addClass('page-wrapper-active');
    });

    $('#main-form-close').on('click', function()
    {
        $('#main-form').removeClass('page-wrapper-active');
    });
</script>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/about_category.blade.php ENDPATH**/ ?>