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
          <label for="exampleInputEmail1">Заголовок</label>
          <input type="text" class="form-control" placeholder="Заголовок" name="title" required value="{{$sale->title}}">
        </div>
        <label for="exampleInputEmail1">Фон</label>
        <input type="file" class="form-control" name="src">
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection