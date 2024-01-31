@extends('Layouts.admin')

@section('title')
    Добавить услугу
@endsection

@section('services')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.service.store')}}" method="post"  enctype="multipart/form-data">
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
          <input type="text" class="form-control" placeholder="Название" name="url" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст,ru</label>
            <textarea class="form-control" name="description_ru" placeholder="Текст описания..."></textarea>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст,kz</label>
              <textarea class="form-control" name="description_kz" placeholder="Текст описания..." ></textarea>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Обложка</label>
          <input type="file" class="form-control" placeholder="Название" name="src" required>
        </div>

        <fieldset>
          <legend>SEO инфа</legend>
          <div class="form-group">
            <label for="exampleInputEmail1">SEO-заголовок, ru</label>
            <input type="text" class="form-control" placeholder="SEO title" name="seo_title_ru">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">SEO-заголовок, kz</label>
            <input type="text" class="form-control" placeholder="SEO title kz" name="seo_title_kz">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">META-описание, ru</label>
            <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_ru">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">META-описание, kz</label>
            <input type="text" class="form-control" placeholder="Meta desc kz" name="meta_desc_kz">
        </div>
          
        </fieldset>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection
