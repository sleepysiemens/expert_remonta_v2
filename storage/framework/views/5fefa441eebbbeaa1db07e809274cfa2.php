
<div class="page-wrapper " id="main-form">
    <div class="sale-form-div">
        <button class="form-sale-close" id="main-form-close"><i class="fas fa-times"></i></button>
        <img src="/img/_d40b8276-e5e6-423c-bc70-36e0d3892ecc.jpg">

        <h3>Оставьте ваши контакты</h3>
        <p>
            мы с вами свяжемся
        </p>
        <form class="form-sale" method="post" action="<?php echo e(route('form.store')); ?>">
            <?php echo csrf_field(); ?>
            <input class="hidden" type="text" name="username" placeholder="Имя" required>
            <input class="hidden" type="phone" name="phone" placeholder="Телефон" required>
            <input type="hidden" name="sourse" value="<?php echo e($page); ?>">
            <button class="hidden gradient_button"><span class="flare"></span><p><?php echo e(app()->translate('Отправить')); ?></p></button>
        </form>
    </div>
</div>

<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/form-div.blade.php ENDPATH**/ ?>