@extends('Layouts.admin')

@section('title')
    Редактировать катрочку
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

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.main.why_cards.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.main.why_cards.update', $WhyCards->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Заголовок, ru</label>
            <input type="text" class="form-control" placeholder="Заголовок" name="title_ru" required value="{{$WhyCards->title_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Заголовок, kz</label>
                <input type="text" class="form-control" placeholder="Заголовок" name="title_kz"  value="{{$WhyCards->title_kz}}">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Позаголовок, ru</label>
            <input type="text" class="form-control" placeholder="Позаголовок" name="subtitle_ru" required value="{{$WhyCards->subtitle_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Позаголовок, kz</label>
                <input type="text" class="form-control" placeholder="Позаголовок" name="subtitle_kz"  value="{{$WhyCards->subtitle_kz}}">
            </div>
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection
