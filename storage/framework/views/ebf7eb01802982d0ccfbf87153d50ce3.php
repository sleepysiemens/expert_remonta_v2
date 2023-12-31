<section class="welcome welcome-contact">
  <?php $__currentLoopData = $Headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img class="welcome-bg" src="/img/main_bg/<?php echo e($Header->src); ?>">
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="welcome-content">
                <div class="welcome-header">
                    <?php $__currentLoopData = $Headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h1><?php echo e(app()->db_translate($Header->title_ru,$Header->title_kz)); ?></h1>
                        <h3><?php echo e(app()->db_translate($Header->subtitle_ru,$Header->subtitle_kz)); ?></h3>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
               <div class="contact-div">

                    <a href="<?php $__currentLoopData = $whatsapp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($wp->link); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" target="_blank" class="contact-banner whatsapp">
                        <div>
                            <i class="fab fa-whatsapp" aria-hidden="true"></i>
                            <h3>WhatsApp</h3>
                        </div>
                    </a>

                    <a href="<?php $__currentLoopData = $telegram; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tg->link); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" target="_blank" class="contact-banner telegram">
                        <div>
                            <i class="fab fa-telegram-plane" aria-hidden="true"></i>
                            <h3>Telegram</h3>
                        </div>
                    </a>

                    <a href="<?php $__currentLoopData = $instagram; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $insta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($insta->link); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" target="_blank" class="contact-banner instagram">
                        <div>
                            <i class="fab fa-instagram" aria-hidden="true"></i>
                            <h3>Instagram</h3>
                        </div>
                    </a>

                    <a href="<?php $__currentLoopData = $phone; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($ph->link); ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>" target="_blank" class="contact-banner phone">
                        <div>
                            <i class="fas fa-phone" aria-hidden="true"></i>
                            <h3>Телефон</h3>
                        </div>
                    </a>
               </div>
            </div>
        </section>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/welcome-contacts.blade.php ENDPATH**/ ?>