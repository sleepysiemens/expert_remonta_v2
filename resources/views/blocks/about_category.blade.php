<section class="about-service">
  <div class="breadcrumbs">
        <a href="/uslugi">Услуги</a> 
        @if(isset($category->service))
        / <a href="/uslugi/{{$category->service->url}}">{{$category->service->title_ru}}</a>
        @endif
      </div>
    <div class="about-with-button">
        <h1>{{db_translate($category->title_ru, $category->title_kz)}}</h1>
        <a class="gradient_button" id="main-form-btn" ><span class="flare"></span><p>{{__('Заказать услугу')}}</p></a>
    </div>
    <p>
        {{db_translate($category->description_ru, $category->description_kz)}}
    </p>
</section>

<script>
    $('#main-form-btn').on('click', function()
    {
        $('#main-form').addClass('page-wrapper-active');
    });

    $('#main-form-close').on('click', function()
    {
        $('#main-form').removeClass('page-wrapper-active');
    });
</script>
