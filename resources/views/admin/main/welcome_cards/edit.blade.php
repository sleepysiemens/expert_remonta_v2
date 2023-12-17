@extends('Layouts.admin')

@section('title')
    Редактировать катрочку
@endsection

@section('cards')
    active
@endsection

@section('dropdown')
display:block;
@endsection

@section('menu-dropdown')
menu-open
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.main.welcome_cards.index')}}" class="btn btn-default">
      <i class="fas fa-arrow-left"></i> Назад
  </a>
  </div>
</div>
<br>


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.main.welcome_cards.update', $WelcomeCards->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Заголовок, ru</label>
                <textarea id="summernote" name="title_ru" placeholder="Текст описания..." required>{{$WelcomeCards->title_ru}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Заголовок, kz</label>
                <textarea id="summernote1" name="title_kz" placeholder="Текст описания...">{{$WelcomeCards->title_kz}}</textarea>
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
