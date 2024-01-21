@extends('Layouts.admin')

@section('title')
    Редактировать страницу услуг
@endsection

@section('service_pages')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.page.index')}}" class="btn btn-default">
      <i class="fas fa-arrow-left"></i> Назад
  </a>
  </div>
</div>
<br>


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.page.update', $category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Название, ru</label>
            <input type="text" class="form-control" placeholder="Название" name="title_ru" required value="{{$category->title_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Название, kz</label>
                <input type="text" class="form-control" placeholder="Название" name="title_kz" value="{{$category->title_kz}}">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Ссылка</label>
            <input type="text" class="form-control" placeholder="Ссылка" name="url" required value="{{$category->url}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, ru</label>
              <textarea id="summernote" name="description_ru" placeholder="Текст описания..." required>{!!$category->description_ru !!}</textarea>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Текст, kz</label>
                <textarea id="summernote1" name="description_kz" placeholder="Текст описания...">{!!$category->description_kz!!}</textarea>
            </div>
          <div class="form-group">

            <label for="exampleInputEmail1">Обложка</label>
              <div style="display: flex; justify-content: start">
                  <input style="width: 50%" type="file" class="form-control" id="imageFile" placeholder="Название" name="src" >
                  <img id="prevImage" style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/categories/'.$category->src)}}">
              </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Относится к</label>
            <select class="form-control" name="service_id" required>
              @foreach ($services as $service)
              <option @if ($service->id==$category->service_id) selected @endif value="{{$service->id}}">{{$service->title_ru}}</option>
              @endforeach
            </select>
          </div>

          <fieldset>
            <legend>SEO инфа</legend>
            <div class="form-group">
              <label for="exampleInputEmail1">SEO-заголовок, ru</label>
              <input type="text" class="form-control" placeholder="SEO title" name="seo_title_ru" required value="{{$category->seo_title_ru}}">
              {{--<span class="title_var">%CITY%</span>
              <p>Нажмите на кнопку %CITY% выше для быстрой вставки динамической переменной города</p>--}}
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">SEO-заголовок, kz</label>
              <input type="text" class="form-control" placeholder="SEO title kz" name="seo_title_kz" value="{{$category->seo_title_kz}}">
              {{--<span class="title_var">%CITY%</span>--}}
            </div>
          <div class="form-group">
              <label for="exampleInputEmail1">META-описание, ru</label>
              <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_ru" required value="{{$category->meta_desc_ru}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">META-описание, kz</label>
              <input type="text" class="form-control" placeholder="Meta desc kz" name="meta_desc_kz" value="{{$category->meta_desc_kz}}">
          </div>
            
          </fieldset>

          <fieldset>
            <legend>Слайды (можно выбрать несколько)</legend>
            
            <input type="file" name="slides[]" multiple="multiple" />
          </fieldset>
          @if(count($category->slides) > 0)
      <div class="col-12">
        <h3>Слайды для этой страницы (<span id="slides_count">{{count($category->slides)}}</span>)</h3>
        <div class="row">
        @foreach($category->slides as $slide)
          <div class="col-2 ajax_slides" data-slide="{{$slide->id}}">
            <img src="{{asset('img/category_slider/'."$category->id/".$slide->src)}}" alt="" width="200">
            <i class="far fa-trash-alt" style="cursor:pointer;color:rgb(196, 3, 3);" onclick="(function() {
              if(confirm('Действительно удалить этот слайд?')) deleteSlide({{$slide->id}}, '{{csrf_token()}}')
            })();"></i>
          </div>
        @endforeach
        </div>
      </div>
    @endif
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>


@endsection

<style>
  .title_var {
  background: aliceblue;
  padding: 5px;
  cursor: pointer;
  margin-top: 5px;
  display: inline-block;
}
</style>


<script>
  document.addEventListener("DOMContentLoaded", function(e) {
    //document.querySelector('#var')
    document.addEventListener('click', function(e) {
      if(!e.target.classList.contains('title_var')) return
      let myField = e.target.previousElementSibling
      let myValue = e.target.textContent
      if (myField.selectionStart || myField.selectionStart == '0') {
        var startPos = myField.selectionStart;
        var endPos = myField.selectionEnd;
        myField.value = myField.value.substring(0, startPos)
            + myValue
            + myField.value.substring(endPos, myField.value.length);
      } else {
          myField.value += myValue;
      }
    })
  });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onloadend = function(e) {
                $('#prevImage').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageFile").change(function() {
        readURL(this);
    });


    function deleteSlide(id, token) {
      const headers = new Headers({
        'Content-Type': 'x-www-form-urlencoded',
        'X-CSRF-TOKEN': `${token}`
    });
      fetch(`/admin/page/destroySliderAjax/${id}`, {
        method: 'DELETE',
        headers,
    }).then(response => {
      response.json()
      document.querySelector(`[data-slide="${id}"]`).remove()
      document.querySelector("#slides_count").innerText = Number(document.querySelector("#slides_count").innerText) - 1
    })
    }
</script>
