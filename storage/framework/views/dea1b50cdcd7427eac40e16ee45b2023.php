<?php
    $i=0;
?>
<?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php
    $i++;
?>
<?php
    $end_date[$i]=Cookie::get('sale_'.$sale->id, date("Y-m-d", strtotime('+ '.$sale->period.' days')));
?>
<div class="page-wrapper " id="sale-form-<?php echo e($i); ?>">
    <div class="sale-form-div">
        <button class="form-sale-close" id="sale-form-close-<?php echo e($i); ?>"><i class="fas fa-times"></i></button>
        <img src="/img/sales/<?php echo e($sale->src); ?>">
        <div style="display: flex; justify-content: start; width: 95%; margin: 10px auto">
            <div class="percent"><p>-<?php echo e($sale->percent); ?>%</p></div>
            <div class="timer"><p id="action2<?php echo e($sale->id); ?>"></p></div>
        </div>

        <h3><?php echo e(app()->db_translate($sale->title_ru,$sale->title_kz)); ?></h3>
        <p>
            <?php echo e(app()->db_translate($sale->description_ru,$sale->description_kz)); ?>

        </p>
        <form class="form-sale" method="post" action="<?php echo e(route('form.store')); ?>">
            <?php echo csrf_field(); ?>
            <input class="hidden" type="text" name="username" placeholder="Имя" required>
            <input class="hidden" type="phone" name="phone" placeholder="Телефон" required>
            <input type="hidden" name="sourse" value="<?php echo e($page); ?>/sale/<?php echo e($sale->title); ?>">
            <button class="hidden gradient_button"><span class="flare"></span><p><?php echo e(app()->translate('Участвовать')); ?></p></button>
        </form>
    </div>
</div>


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<script>
    // Предполагаем, что у вас есть массив с данными акций
var actions = [
        <?php $j=1; ?>
        <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    { id: "action2<?php echo e($sale->id); ?>", endDate: "<?php echo e($end_date[$j]); ?>" },
    <?php $j++; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
];


actions.forEach(function(action) {
    // Конвертируем дату в формате строки в формат Date
    var countDownDate = new Date(action.endDate).getTime();

    // Обновляем таймер каждую секунду
    var x = setInterval(function() {

        // Получаем текущее время
        var now = new Date().getTime();

        // Находим разницу времени
        var distance = countDownDate - now;

        // Расчёты для дней, часов, минут и секунд
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Выводим результат в элемент с id="timer"
        document.getElementById(action.id).innerHTML = days + "д " + hours + "ч " + minutes + "м " + seconds + "с ";


        // Если таймер истекает, выводим текст
        if (distance < 0) {
            clearInterval(x);
            document.getElementById(action.id).innerHTML = "Акция окончена";
        }
    }, 1000);
});

</script>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/sale_form.blade.php ENDPATH**/ ?>