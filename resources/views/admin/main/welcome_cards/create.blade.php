@extends('Layouts.admin')

@section('title')
    Добавить катрочку
@endsection

@section('why')
    active
@endsection

@section('dropdown')
display:block;
@endsection

@section('menu-dropdown')
menu-open
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.main.welcome_cards.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Заголовок</label>
          <input type="text" class="form-control" placeholder="Заголовок" name="title" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Изображение</label>
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