@extends('Layouts.admin')

@section('title')
    Редактировать скидку
@endsection

@section('sales')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.sale.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.sale.update', $sale->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Заголовок, ru</label>
                <input type="text" class="form-control" placeholder="Заголовок" name="title_ru" required value="{{$sale->title_ru}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Заголовок, kz</label>
                <input type="text" class="form-control" placeholder="Заголовок" name="title_kz" value="{{$sale->title_kz}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Текст, ru</label>
                <textarea id="summernote" name="description_ru" placeholder="Текст описания..." required>{{$sale->description_ru}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Текст, kz</label>
                <textarea id="summernote1" name="description_kz" placeholder="Текст описания...">{{$sale->description_kz    }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Процент скидки</label>
                <input type="number" class="form-control" placeholder="%" name="percent" required value="{{$sale->percent}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Срок действия, д</label>
                <input type="number" class="form-control" placeholder="Срок действия, д" name="period" required value="{{$sale->period}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Добавить в архив?</label>
              <input type="checkbox" name="active" @checked(!$sale->active)>
          </div>
            <label for="exampleInputEmail1">Фон</label>
            <input type="file" class="form-control" name="src">
            @include('admin.sale.rules')
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection
