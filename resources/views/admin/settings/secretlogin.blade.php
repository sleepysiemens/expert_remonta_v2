@extends('Layouts.admin')

@section('title')
    Редактировать адрес страницы входа
@endsection

{{--@section('menu')
    active
@endsection--}}

@section('content')


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.settings.loginPatch')}}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Адрес страницы входа</label>
            <small>Разрешены английские буквы и цифры 0-9</small>
            <input type="text" class="form-control" placeholder="Название" name="loginUrl" required value="{{$loginUrl}}">
          </div>


        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection