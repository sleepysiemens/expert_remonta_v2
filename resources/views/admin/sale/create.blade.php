@extends('Layouts.admin')

@section('title')
    Добавить скидку
@endsection

@section('sales')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.sale.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Заголовок</label>
          <input type="text" class="form-control" placeholder="Заголовок" name="title" required>
        </div>
        <label for="exampleInputEmail1">Фон</label>
        <input type="file" class="form-control" name="src">
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection