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
          <label for="exampleInputEmail1">SEO-заголовок</label>
          <input type="text" class="form-control" placeholder="SEO" name="seo" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">META-описание</label>
          <input type="text" class="form-control" placeholder="Meta" name="meta" required>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection