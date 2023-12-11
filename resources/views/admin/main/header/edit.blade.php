@extends('Layouts.admin')

@section('title')
    Редактировать заголовок
@endsection

@section('header')
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
    <form action="{{route('admin.main.header.update', $header->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Заголовок</label>
          <input type="text" class="form-control" placeholder="Заголовок" name="title" required value="{{$header->title}}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Подзаголовок</label>
          <input type="text" class="form-control" placeholder="Подзаголовок" name="subtitle" required value="{{$header->subtitle}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Изображение</label>
            <input type="file" class="form-control" placeholder="Название" name="src">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection