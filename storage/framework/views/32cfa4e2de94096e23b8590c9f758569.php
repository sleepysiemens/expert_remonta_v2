<?php $__env->startSection('title'); ?>
    Отзывы
<?php $__env->stopSection(); ?>

<?php $__env->startSection('new_reviews'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-12 table-responsive">
    <table class="table table-striped">
      <thead>
          <tr>
            <th>Id</th>
            <th>Дата создания</th>
            <th>Имя пользователя</th>
            <th>Оценка</th>
            <th>Текст</th>
          </tr>
      </thead>
      <tbody>

<?php $__currentLoopData = $new_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>
                <td><?php echo e($new_review->id); ?></td>
                <td><?php echo e($new_review->created_at); ?></td>
                <td><?php echo e($new_review->username); ?></td>
                <td><?php echo e($new_review->rating); ?>/5</td>
                <td><?php echo e($new_review->text); ?></td>
                  
              </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/admin/new_review/index.blade.php ENDPATH**/ ?>