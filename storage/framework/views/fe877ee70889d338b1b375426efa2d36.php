
<div class="page-wrapper " id="review-form">
    <div class="sale-form-div">
        <button class="form-sale-close" id="review-form-close"><i class="fas fa-times"></i></button>
        <img src="/img/_d40b8276-e5e6-423c-bc70-36e0d3892ecc.jpg">

        <h3>Оставьте ваши контакты</h3>
        <p>
            мы с вами свяжемся
        </p>
        <form class="form-sale" method="post" action="<?php echo e(route('review.store')); ?>">
            <?php echo csrf_field(); ?>
            <input class="hidden" type="text" name="username" placeholder="Имя" required>
            <input class="hidden" type="number" min="1" max="5" name="rating" placeholder="Оценка" required>
            <textarea class="hidden" name="text" placeholder="текст..." required></textarea>
            <button class="hidden gradient_button"><span class="flare"></span><p><?php echo e(app()->translate('Отправить')); ?></p></button>
        </form>
    </div>
</div>

<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/review-form.blade.php ENDPATH**/ ?>