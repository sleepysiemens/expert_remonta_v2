<div class="vc_page_contact" id="vc_page_contact">
  <div class="vc_page_wrap">
    <div class="vc_page_heading ui_kit_h1_heading">@lang('Оставьте свои контакты,<br> чтобы стать частью <br> нашей команды')</div>
    <form action="{{route('resume.store')}}" method="POST" enctype='multipart/form-data'> 
      @csrf
      <input type="hidden" name="source" value="{{$page}}">
      <div class="vc_page_input">
        <input class="ui_kit_input" name="fio" type="text" required placeholder="@lang('ФИО')"/>
      </div>
      <div class="vc_page_input">
        <input class="ui_kit_input" name="phone" type="text" required placeholder="+7-XXX-XXX-XX-XX"/>
      </div>
      <div class="vc_page_input">
        <input class="ui_kit_input" name="email" type="email" placeholder="Email"/>
      </div>
      <div class="vc_page_input">
        <label class="ui_kit_input" for="file">@lang('Прикрепить резюме')</label>
        <input type="file" id="file" name="resume_file" required accept=".pdf,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"/>
      </div>
      <button class="ui_kit_button vc_page_button">@lang('Отправить')</button>
    </form>
  </div>
</div>