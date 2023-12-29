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
          <label for="exampleInputEmail1">Заголовок, ru</label>
          <input type="text" class="form-control" placeholder="Заголовок" name="title_ru" required>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Заголовок, kz</label>
              <input type="text" class="form-control" placeholder="Заголовок" name="title_kz">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, ru</label>
              <textarea id="summernote" name="description_ru" placeholder="Текст описания..." required></textarea>
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, kz</label>
              <textarea id="summernote1" name="description_kz" placeholder="Текст описания..."></textarea>
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Процент скидки</label>
              <input type="number" class="form-control" placeholder="%" name="percent" required>
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Срок действия, д</label>
              <input type="number" class="form-control" placeholder="Срок действия, д" name="period" required>
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
