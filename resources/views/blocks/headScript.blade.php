{{--<script>
        // скрипт не выполняется, пока не загрузятся стили
        console.log('styles are loaded')
    </script>--}}
<script>
        //document.addEventListener("DOMContentLoaded", ready);
        //document.addEventListener("load", ready);
        function ready () {
        setTimeout(function () {
            document.body.classList.add('body_visible');
            }, 1);
        };
        let slowLoad = window.setTimeout( function() {
            //alert( "the page is taking its sweet time loading" );
            let loader = document.querySelector('#loader')
            loader.classList.add('visible')
        }, 5000 );
        // решает проблему мигания шрифта, но юзеры с медленным интернетом будут долго видеть
        // полностью белый экран, нужен либо какой-то краивый лоадер им
        window.onload = function() { 
            window.clearTimeout( slowLoad );
            loader.classList.remove('visible')
            document.body.classList.add('body_visible');
            // можно также использовать window.addEventListener('load', (event) => {
            //alert('Страница загружена');
        };
</script>