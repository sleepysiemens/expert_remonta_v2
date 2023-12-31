
<section class="sales">
    <h1 class="section-header hidden"><?php echo e(app()->translate('Специальные предложения')); ?></h1>
    <button class="right-arrow" id="scroll-right">
        <i class="fas fa-arrow-right"></i>
    </button>
    <button class="left-arrow" id="scroll-left">
        <i class="fas fa-arrow-left"></i>
    </button>
    <div class="review-wrapper">
        <div class="reviews-div" style="height: 300px">

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

                <?php
                if(!isset($_COOKIE['sale_'.$i]))
                    {
                        setcookie('sale_'.$i, date("Y-m-d", strtotime('+ '.$sale->period.' days')));
                        $sale[$i]=date("Y-m-d", strtotime('+ '.$sale->period.' days'));
                    }
                else
                    {
                        $sale[$i]=$_COOKIE['sale_'.$i];
                    }
                ?>

            <a class="sale-banner scroll-hidden" id="sale-link-<?php echo e($i); ?>">
                <span class="top-right-percent"><p>-<?php echo e($sale->percent); ?>%</p></span>
                <span class="top-left-timer"><p id="action<?php echo e($sale->id); ?>"></p></span>
                <div class="sale-bg">
                    <img src=" /img/sales/<?php echo e($sale->src); ?>">
                </div>

                <div class="sale-text-div">
                    <div class="sale-text-subdiv">
                        <p><?php echo e(app()->db_translate($sale->title_ru,$sale->title_kz)); ?></p>
                    </div>
                    <div class="percent2"></div>
                </div>
            </a>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php
                $sale_i=$i;
            ?>
        </div>
    </div>
</section>

<script>
    for(let i=1; i<=<?php echo e($i); ?>; i++)
    {
        $('#sale-link-'+i).on('click', function()
        {
            $('#sale-form-'+i).addClass('page-wrapper-active');
        });

        $('#sale-form-close-'+i).on('click', function()
        {
            $('#sale-form-'+i).removeClass('page-wrapper-active');
        });
    }
</script>


<script>
    // Предполагаем, что у вас есть массив с данными акций
    var actions = [
            <?php $j=1; ?>
            <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        { id: "action<?php echo e($sale->id); ?>", endDate: "<?php echo e($end_date[$j]); ?>" },
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
            document.getElementById(action.id).innerHTML = days + ":" + hours + ":" + minutes + ":" + seconds;


            // Если таймер истекает, выводим текст
            if (distance < 0) {
                clearInterval(x);
                document.getElementById(action.id).innerHTML = "Акция окончена";
            }
        }, 1000);
    });

</script>


<script>
    $('#scroll-right').on('click', function() {
        $('.review-wrapper').animate({
            scrollLeft: "+=300px"
        }, "slow");
        console.log('scroll-left');
    });

    $('#scroll-left').on('click', function() {
        $('.review-wrapper').animate({
            scrollLeft: "-=300px"
        }, "slow");
        console.log('scroll-right');

    });
</script>
<?php /**PATH /home/siemens/Documents/Laravel/expert_remonta_v2/resources/views/blocks/sales.blade.php ENDPATH**/ ?>