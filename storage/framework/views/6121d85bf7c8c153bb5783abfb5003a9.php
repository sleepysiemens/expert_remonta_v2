<section class="reviews">
    <h1 class="section-header"><?php echo e(app()->translate('Отзывы')); ?></h1>
    <button class="right-arrow" id="scroll-right">
        <i class="fas fa-arrow-right"></i>
    </button>
    <button class="left-arrow" id="scroll-left">
        <i class="fas fa-arrow-left"></i>
    </button>

    <div class="review-wrapper">
        <div class="reviews-div">

            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <a class="review" href="<?php echo e(asset(route('reviews.index'))); ?>">
                <div class="review-div">
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
                    <p>
                        <?php echo e(app()->db_translate($review->text_ru,$review->text_kz)); ?>

                    </p>
                </div>
            </a>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>

<script>
    $('#scroll-right').on('click', function() {
        $('.review-wrapper').animate({
            scrollLeft: "+=300px"
        }, "slow");
        console.log('scroll-left');
    });

    $('#scroll-left').on('click', function() {
        $('.review-wrapper').animate({
            scrollLeft: "-=300px"
        }, "slow");
        console.log('scroll-right');

    });
</script>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/reviews.blade.php ENDPATH**/ ?>