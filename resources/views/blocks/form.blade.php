<section class="form" name="#form">
    <div class="form-bg">
        <!--<img src=" /img/_00ad06af-d903-4288-a564-13823733a810.jpg">-->
    </div>
    <div class="form-content">
        <div class="welcome-header hidden">
            <h1>{{__('Оставьте ваши контакты')}}</h1>
            <h3>{{__('Мы с вами свяжемся')}}</h3>
        </div>
        <form class="form-div" method="post" action="{{route('form.store')}}">
            @csrf
            <input class="hidden" type="text" name="name" placeholder="Имя" required>
            <input class="hidden" type="phone" name="phone" placeholder="Телефон" required>
            <input type="hidden" name="sourse" value={{$page}}>
            <button class="hidden gradient_button"><span class="flare"></span><p>{{__('Отправить')}}</p></button>
        </form>
    </div>
</section>
