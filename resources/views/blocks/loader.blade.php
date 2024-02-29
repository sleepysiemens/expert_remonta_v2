<style>
    #loader {
        width: 100vw;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background: #fff url(/svg/Infinity-1s-200px.svg) no-repeat 50% 50%;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999999999999;
    }
    #loader.visible {
        display: flex;
    }
    #loader div {
        background: #fff url(/img/logo.png) no-repeat left top;
        padding: 20px 50px;
        background-size: contain;
        padding-left: 135px;
        margin-top: -240px;
    }
</style>

<div id="loader">
    <div>
        Эксперт Ремонта <br>
        Загружаем сайт...
    </div>

</div>