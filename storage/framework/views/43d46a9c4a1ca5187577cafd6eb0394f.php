<?php $__env->startSection('title'); ?>
    Галерея
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gallery'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-12">
      <a href="<?php echo e(route('admin.gallery.create')); ?>" class="btn btn-success">
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
              <th>Alt</th>
              <th>Фото</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><?php echo e($gallery->id); ?></td>
                    <td><?php echo e($gallery->title); ?></td>
                    <td><img src="<?php echo e(asset('img/gallery/'.$gallery->src)); ?>" style="height: 150px; width: 150px; object-fit: contain"></td>
                    <td>
                      <form method="post" action="<?php echo e(route('admin.gallery.destroy',$gallery->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="<?php echo e(route('admin.gallery.edit',$gallery->id)); ?>"><i class="fas fa-pen"></i></a></td>
                    <td><a href="<?php echo e(route('admin.gallery.show',$gallery->id)); ?>"><i class="fas fa-arrow-right"></i></a></td>
                </tr>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/admin/gallery/index.blade.php ENDPATH**/ ?>