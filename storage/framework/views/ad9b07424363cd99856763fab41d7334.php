<?php $__env->startSection('title'); ?>
    Редактировать катрочку
<?php $__env->stopSection(); ?>

<?php $__env->startSection('cards'); ?>
    active
<?php $__env->stopSection(); ?>

<?php $__env->startSection('dropdown'); ?>
display:block;
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu-dropdown'); ?>
menu-open
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
  <div class="col-12">
    <a href="<?php echo e(route('admin.main.welcome_cards.index')); ?>" class="btn btn-default">
      <i class="fas fa-arrow-left"></i> Назад
  </a>
  </div>
</div>
<br>


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="<?php echo e(route('admin.main.welcome_cards.update', $WelcomeCards->id)); ?>" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('patch'); ?>
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Заголовок, ru</label>
                <textarea id="summernote" name="title_ru" placeholder="Текст описания..." required><?php echo e($WelcomeCards->title_ru); ?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Заголовок, kz</label>
                <textarea id="summernote1" name="title_kz" placeholder="Текст описания..."><?php echo e($WelcomeCards->title_kz); ?></textarea>
            </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Изображение</label>
            <input type="file" class="form-control" placeholder="Название" name="src">
          </div>
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/admin/main/welcome_cards/edit.blade.php ENDPATH**/ ?>