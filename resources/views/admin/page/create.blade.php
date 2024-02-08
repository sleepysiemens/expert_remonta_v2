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
          <input type="text" class="form-control" placeholder="Название" name="title_ru" value="{{old('title_ru')}}" required>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Название, kz</label>
              <input type="text" class="form-control" placeholder="Название" name="title_kz" value="{{old('title_kz')}}">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ссылка</label>
          <input type="text" class="form-control" placeholder="Ссылка" name="url" value="{{old('url')}}" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст, ru</label>
              <textarea id="summernote" name="description_ru" placeholder="Текст описания..." required>{!!old('description_ru')!!}</textarea>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, kz</label>
              <textarea id="summernote1" name="description_kz" placeholder="Текст описания...">{!!old('description_kz')!!}</textarea>
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
        <div class="form-group">
          <label for="active">Добавить в архив?</label>
          <input id="active" type="checkbox" name="active">
        </div>

        <fieldset>
          <legend>SEO инфа</legend>
          <div class="form-group">
            <label for="exampleInputEmail1">SEO-заголовок, ru</label>
            <input type="text" class="form-control" placeholder="SEO title" name="seo_title_ru" value="{{old('seo_title_ru')}}" required>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SEO-заголовок, kz</label>
                <input type="text" class="form-control" placeholder="SEO title" name="seo_title_kz" value="{{old('seo_title_kz')}}">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">META-описание, ru</label>
            <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_ru" value="{{old('meta_desc_ru')}}" required>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">META-описание, kz</label>
                <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_kz" value="{{old('meta_desc_kz')}}">
            </div>
          
        </fieldset>

        <fieldset>
          <legend>Слайды (можно выбрать несколько)</legend>
          
          <input type="file" name="slides[]" multiple="multiple" />
          @include('admin.page.rules')
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

