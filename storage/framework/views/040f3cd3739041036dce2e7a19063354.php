<?php $__env->startSection('title'); ?>
    Карточка <?php echo e($WelcomeCards->id); ?>

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

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="<?php echo e(route('admin.main.welcome_cards.edit', $WelcomeCards->id)); ?>" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="<?php echo e(route('admin.main.welcome_cards.destroy',$WelcomeCards->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('delete'); ?>
        <button type="submit" class="btn btn-primary float-right" style="margin-left: 10px; background-color: rgb(196, 3, 3); border: rgb(196, 3, 3)">
            <i class="far fa-trash-alt"></i></i> Удалить
        </button>
      </form>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Название, ru</th>
              <th>Название, kz</th>
              <th>Изображение</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                  <td><?php echo e($WelcomeCards->id); ?></td>
                  <td><?php echo e($WelcomeCards->title_ru); ?></td>
                  <td><?php echo e($WelcomeCards->title_kz); ?></td>
                    <td><img src="<?php echo e(asset('img/cards/'.$WelcomeCards->src)); ?>" style="height: 150px; width: 150px; object-fit: contain"></td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/admin/main/welcome_cards/show.blade.php ENDPATH**/ ?>