<?php $__env->startSection('title'); ?>
    Отзывы
<?php $__env->stopSection(); ?>

<?php $__env->startSection('reviews'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-12">
      <a href="<?php echo e(route('admin.review.create')); ?>" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
    </div>
  </div>
  <br>

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Имя, ru</th>
              <th>Имя, kz</th>
              <th>Оценка</th>
              <th>Текст, ru</th>
              <th>Текст, kz</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($review->id); ?></td>
                    <td><?php echo e($review->username_ru); ?></td>
                    <td><?php echo e($review->username_kz); ?></td>
                    <td><?php echo e($review->rating); ?>/5</td>
                    <td><?php echo e($review->text_ru); ?></td>
                    <td><?php echo e($review->text_kz); ?></td>
                    <td>
                      <form method="post" action="<?php echo e(route('admin.review.destroy',$review->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="<?php echo e(route('admin.review.edit',$review->id)); ?>"><i class="fas fa-pen"></i></a></td>
                    <td><a href="<?php echo e(route('admin.review.show',$review->id)); ?>"><i class="fas fa-arrow-right"></i></a></td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/admin/review/index.blade.php ENDPATH**/ ?>