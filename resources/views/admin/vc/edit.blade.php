@extends('Layouts.admin')

@section('title')
    Редактировать категорию вакансий
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.vc.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.vc.update', $vc->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" class="form-control" placeholder="Название" name="name" required value="{{$vc->name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">URL</label>
            <input type="text" class="form-control" placeholder="название" name="url" value="{{$vc->url}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Название КЗ</label>
            <input type="text" class="form-control" placeholder="название" name="name_kz" value="{{$vc->name_kz}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">SEO Title ru</label>
            <input type="text" class="form-control" placeholder="название" name="seo_title_ru" value="{{$vc->seo_title_ru}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">SEO Title kz</label>
            <input type="text" class="form-control" placeholder="название" name="seo_title_kz" value="{{$vc->seo_title_kz}}">
          </div>
          <div class="form-group">
            <label for="mtru">Meta desc ru</label>
            <input type="text" class="form-control" placeholder="название" name="meta_desc_ru" value="{{$vc->meta_desc_ru}}">
          </div>
          <div class="form-group">
            <label for="mtkz">Meta desc kz</label>
            <input type="text" class="form-control" placeholder="название" name="meta_desc_kz" value="{{$vc->meta_desc_kz}}">
        </div>
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection