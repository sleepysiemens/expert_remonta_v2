@extends('Layouts.admin')

@section('title')
    Редактировать текст на главной
@endsection

@section('main_text')
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
    <form action="{{route('admin.main.main_text.update', $text->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
      <div class="card-body">
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, ru</label>
              <textarea id="summernote" name="text_ru" placeholder="Текст описания..." required>{{$text->text_ru}}</textarea>
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, kz</label>
              <textarea id="summernote1" name="text_kz" placeholder="Текст описания...">{{$text->text_kz}}</textarea>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection
