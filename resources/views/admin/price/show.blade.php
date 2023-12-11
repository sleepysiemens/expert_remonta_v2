@extends('Layouts.admin')

@section('title')
    Прайс {{$price->id}}
@endsection

@section('price')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.price.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.price.edit', $price->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.price.destroy',$price->id)}}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-primary float-right" style="margin-left: 10px; background-color: rgb(196, 3, 3); border: rgb(196, 3, 3)">
            <i class="far fa-trash-alt"></i></i> Удалить
        </button>
      </form>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Название</th>
              <th>Ед. Изм.</th>
              <th>Цена ₸</th>
              <th>Категория</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                  <td>{{$price->id}}</td>
                  <td>{{$price->title}}</td>
                  <td>{{$price->unit}}</td>
                  <td>{{$price->price}}</td>
                  <td>{{$price->category}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection