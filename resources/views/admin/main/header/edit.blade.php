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
          <label for="exampleInputEmail1">Заголовок, ru</label>
          <input type="text" class="form-control" placeholder="Заголовок_ru" name="title_ru" required value="{{$header->title_ru}}">
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Заголовок, kz</label>
              <input type="text" class="form-control" placeholder="Заголовок_kz" name="title_kz"  value="{{$header->title_kz}}">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Подзаголовок, ru</label>
          <input type="text" class="form-control" placeholder="Подзаголовок" name="subtitle_ru" required value="{{$header->subtitle_ru}}">
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Подзаголовок, kz</label>
              <input type="text" class="form-control" placeholder="Подзаголовок" name="subtitle_kz"  value="{{$header->subtitle_kz}}">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Изображение</label>
            <div style="display: flex; justify-content: start">
                <input style="width: 50%" type="file" class="form-control" id="imageFile" placeholder="Название" name="src" >
                <img id="prevImage" style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/main_bg/'.$header->src)}}">
            </div>
            <input type="checkbox" name="blur" id="blur" value=1 @if($header->blur==1) checked @endif>
            <label for="blur">Размытие</label>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection
