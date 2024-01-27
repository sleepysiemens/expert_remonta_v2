@extends('Layouts.admin')

@section('title')
    Добавить категорию вакансий
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.vc.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Название</label>
          <input type="text" class="form-control" placeholder="название" name="name" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">URL (укажите сами или сгенерируется автоматически из названия)</label>
          <input type="text" class="form-control" placeholder="название" name="url">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Название КЗ</label>
          <input type="text" class="form-control" placeholder="название" name="name_kz">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">SEO Title ru</label>
          <input type="text" class="form-control" placeholder="название" name="seo_title_ru">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">SEO Title kz</label>
          <input type="text" class="form-control" placeholder="название" name="seo_title_kz">
        </div>
        <div class="form-group">
          <label for="mtru">Meta desc ru</label>
          <input type="text" class="form-control" placeholder="название" name="meta_desc_ru">
        </div>
        <div class="form-group">
          <label for="mtkz">Meta desc kz</label>
          <input type="text" class="form-control" placeholder="название" name="meta_desc_kz">
      </div>
      
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection