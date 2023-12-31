<?php
    $last_category=0;
    $i=1;
?>
    <section>
        <h1 class="section-header"><?php echo e(app()->translate('Расценки')); ?></h1>
    </section>

        <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(($price->category)!=$last_category): ?>
                <?php
                    $last_category=$price->category;
                ?>

                </section>
                <section class="table">
                    <div class="table-header">
                        <p class="c1"><?php echo e($price->category); ?></p>
                        <p class="c2">Ед. изм.</p>
                        <p class="c3">Цена ₸</p>
                    </div>
                    <?php if($i%2==1): ?>
                        <div class="table-g">
                    <?php else: ?>
                        <div class="table-tr">
                    <?php endif; ?>
                        <p class="c1">
                            <?php echo e(app()->db_translate($price->title_ru, $price->title_kz)); ?>

                        </p>
                        <p class="c2">
                            <?php echo e(app()->db_translate($price->unit_ru, $price->unit_kz)); ?>


                        </p>
                        <p class="c3">
                            <?php echo e($price->price); ?>

                        </p>
                    </div>
            <?php else: ?>
                <?php if($i%2==1): ?>
                    <div class="table-g">
                <?php else: ?>
                    <div class="table-tr">
                <?php endif; ?>
                    <p class="c1">
                        <?php echo e(app()->db_translate($price->title_ru, $price->title_kz)); ?>

                    </p>
                    <p class="c2">
                        <?php echo e(app()->db_translate($price->unit_ru, $price->unit_kz)); ?>

                    </p>
                    <p class="c3">
                        <?php echo e($price->price); ?>

                    </p>
                </div>
            <?php endif; ?>
            <?php
                $i++;
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </section>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/prices.blade.php ENDPATH**/ ?>