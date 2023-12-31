<?php $__env->startSection('title'); ?>
    Заявки
<?php $__env->stopSection(); ?>

<?php $__env->startSection('applications'); ?>
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
            <th>Телефон</th>
            <th>Дата</th>
            <th>Город</th>
            <th>Источник</th>
            <th></th>
          </tr>
      </thead>
      <tbody>

<?php $__currentLoopData = $applications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>
                <td><?php echo e($application->id); ?></td>
                <td><?php echo e($application->created_at); ?></td>
                <td><?php echo e($application->username); ?></td>
                <td><?php echo e($application->phone); ?></td>
                <td><?php echo e($application->date_time); ?></td>
                <td><?php echo e($application->city); ?></td>
                <td><?php echo e($application->sourse); ?></td>
                <td>
                  <form method="post" action="<?php echo e(route('admin.application.destroy',$application->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/admin/application/index.blade.php ENDPATH**/ ?>