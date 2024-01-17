@extends('Layouts.admin')

@section('title')
    Добавить страницу услуг
@endsection

@section('service_pages')active @endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.page.store')}}" method="post" class="dropzone" id="my-dropzone" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Название, ru</label>
          <input type="text" class="form-control" placeholder="Название" name="title_ru" required>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Название, kz</label>
              <input type="text" class="form-control" placeholder="Название" name="title_kz">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ссылка</label>
          <input type="text" class="form-control" placeholder="Ссылка" name="url" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст, ru</label>
              <textarea id="summernote" name="description_ru" placeholder="Текст описания..." required></textarea>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, kz</label>
              <textarea id="summernote1" name="description_kz" placeholder="Текст описания..."></textarea>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Обложка</label>
          <input type="file" class="form-control" placeholder="Название" name="src" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Относится к</label>
          <select class="form-control" name="service_id" required>
            @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->title_ru}}</option>
            @endforeach
          </select>
        </div>

        <fieldset>
          <legend>SEO инфа</legend>
          <div class="form-group">
            <label for="exampleInputEmail1">SEO-заголовок, ru</label>
            <input type="text" class="form-control" placeholder="SEO" name="seo_ru" required>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SEO-заголовок, kz</label>
                <input type="text" class="form-control" placeholder="SEO" name="seo_kz">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">META-описание, ru</label>
            <input type="text" class="form-control" placeholder="Meta" name="meta_ru" required>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">META-описание, kz</label>
                <input type="text" class="form-control" placeholder="Meta" name="meta_kz" >
            </div>
          
        </fieldset>

        <fieldset>
          <legend>Слайды (можно выбрать несколько)</legend>
          
          <input type="file" name="slides[]" multiple="multiple" />
        </fieldset>
      </div>

      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
    {{--<button type="submit" class="btn btn-primary">Добавить</button>--}}
  </div>
@endsection

{{--@push('dropzone')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

<script>
  // Note that the name "myDropzone" is the camelized
  // id of the form.
  Dropzone.options.myDropzone = {
    // Configuration options go here
    maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
  };
</script>

@endpush --}}

