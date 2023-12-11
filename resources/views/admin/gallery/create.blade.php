@extends('Layouts.admin')

@section('title')
    Добавить фото
@endsection

@section('gallery')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.gallery.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Alt</label>
          <input type="text" class="form-control" placeholder="Alt" name="title" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Фото</label>
          <input type="file" class="form-control" placeholder="Название" name="src" required>
        </div>
      </div>
      
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection