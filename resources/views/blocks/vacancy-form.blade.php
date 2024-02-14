
<div class="page-wrapper " id="main-form">
  <div class="sale-form-div">
      <button class="form-sale-close" id="main-form-close"><i class="fas fa-times"></i></button>
      <img src="{{asset('vacancies_files/form.jpg')}}">

      <h3>Оставьте ваши контакты</h3>
      <p>
          мы с вами свяжемся
      </p>
      <form class="form-sale" method="post" action="{{route('form.store')}}">
          @csrf
          <input class="hidden" type="text" name="name" placeholder="Имя" required>
          <input class="hidden" type="phone" name="phone" placeholder="Телефон" required>
          <input type="hidden" name="sourse" value="{{$page}}">
          <button class="hidden gradient_button"><span class="flare"></span><p>{{__('Отправить')}}</p></button>
      </form>
  </div>
</div>


