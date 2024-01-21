
<div class="page-wrapper " id="main-form">
    <div class="sale-form-div">
        <button class="form-sale-close" id="main-form-close"><i class="fas fa-times"></i></button>
        {{--<img src="/img/_d40b8276-e5e6-423c-bc70-36e0d3892ecc.jpg">--}}
        <img src="{{asset('img/categories/'.$category->src)}}">

        <h3>Оставьте ваши контакты</h3>
        <p>
            мы с вами свяжемся
        </p>
        <form class="form-sale" method="post" action="{{route('form.store')}}">
            @csrf
            <input class="hidden" type="text" name="name" placeholder="Имя" required>
            <input class="hidden" type="phone" name="phone" placeholder="Телефон" required>
            <input type="hidden" name="sourse" value="{{$page}}">
            <input type="hidden" id="cid" value="" name="cid">
            <input type="hidden" id="ycid" value="" name="ycid">
            <button class="hidden gradient_button"><span class="flare"></span><p>{{app()->translate('Отправить')}}</p></button>
        </form>
    </div>
</div>

<script>
    function getYClientID() {
        var match = document.cookie.match('(?:^|;)\\s*_ym_uid=([^;]*)');
        return (match) ? decodeURIComponent(match[1]) : false;
    }

    function getGoogleClientID()
    {
        var match = document.cookie.match('(?:^|;)\\s*_ga=([^;]*)');
        var raw = (match) ? decodeURIComponent(match[1]) : null;
        if (raw)
        {
            match = raw.match(/(\d+\.\d+)$/);
        }
        var gacid = (match) ? match[1] : null;
        if (gacid)
        {
            return gacid;
        }
    }

    document.addEventListener('DOMContentLoaded', function(){
        document.getElementById('cid').value=getGoogleClientID();
        document.getElementById('ycid').value=getYClientID();
});

</script>


