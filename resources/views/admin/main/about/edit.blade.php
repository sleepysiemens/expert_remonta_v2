@extends('Layouts.admin')

@section('title')
    Редактировать "О нас"
@endsection

@section('about')
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
    <form action="{{route('admin.main.about.update', $about->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Заголовок</label>
			<textarea id="summernote" name="title" placeholder="Текст описания..." required>{{$about->title}}</textarea>

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