<section class="faq">
    <h1 class="section-header"><?php echo e(app()->translate('Отзывы')); ?></h1>
    <br>
    <a class="gradient_button" id="add_review" style="height: 35px">
        <span class="flare"></span><p><?php echo e(app()->translate('Оставить отзыв')); ?></p>
    </a>
    <br>
    <div class="hidden" style="width: 95%; margin: auto">
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="review" style="width: 100%; height: auto; padding: 15px 0; margin: auto 0">
                    <div style="width: 90%; margin: auto">
                        <div class="review-user-info">
                            <div class="review-user-info-subdiv">
                                <div style="display: flex">
                                    <h3><?php echo e(app()->db_translate($review->username_ru,$review->username_kz)); ?></h3>
                                    <p style="margin: 0; margin-left: 10px"> <?php if($review->review_date!=null): ?> <?php echo e(date("d.m.Y",strtotime($review->review_date))); ?> <?php endif; ?></p>
                                </div>
                                <div class="review-stars">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <?php if($i<=$review->rating): ?>
                                            <i class="fas fa-star"></i>
                                        <?php else: ?>
                                            <i class="far fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <p><?php echo e(app()->db_translate($review->text_ru,$review->text_kz)); ?></p>
                    </div>
                </a>
            <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>

<script defer src="/js/faq.js"></script>

<?php $__env->startSection('review-form'); ?>
    <?php echo $__env->make('blocks.review-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<script>
    $('#add_review').on('click', function (){
        $('#review-form').addClass('page-wrapper-active');
    })
    $('#review-form-close').on('click', function (){
        $('#review-form').addClass('page-wrapper-active');
    })
</script>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/reviews-page.blade.php ENDPATH**/ ?>