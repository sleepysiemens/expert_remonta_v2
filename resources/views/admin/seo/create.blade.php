@extends('Layouts.admin')

@section('title')
    Добавить SEO
@endsection

@section('seo')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.seo.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Страница</label>
          <input type="text" class="form-control" placeholder="Страница" name="page" required>
        </div>
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
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection
