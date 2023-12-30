<section class="faq">
    <h1 class="section-header"><?php echo e(app()->translate('Частые вопросы')); ?></h1>
    <br>
    <div class="faq-div hidden">

        <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="question" id="ans_<?php echo e($question->id); ?>">
            <a class="question-header" id="q_<?php echo e($question->id); ?>">
                <p>
                    <?php echo e(app()->db_translate($question->question_ru, $question->question_kz)); ?>

                </p>
                <i class="fas fa-chevron-down"></i>
            </a>
            <p class="answer">
                <?php echo e(app()->db_translate($question->answer_ru, $question->answer_kz)); ?>

            </p>
        </div>

        <span class="line line_<?php echo e($question->id); ?> line_<?php echo e($next_id=($question->id)+1); ?>"></span>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    </div>
</section>

<script defer src="/js/faq.js"></script>
<?php /**PATH /home/siemens/Documents/Laravel/TestProject/resources/views/blocks/faq.blade.php ENDPATH**/ ?>