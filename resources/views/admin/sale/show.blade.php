@extends('Layouts.admin')

@section('title')
    Скидка {{$sale->id}}
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

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.sale.edit', $sale->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.sale.destroy',$sale->id)}}">
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
              <th>Заголовок, ru</th>
              <th>Заголовок, kz</th>
                <th>Срок действия, д</th>
                <th>%</th>
                <th>Фон</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$sale->id}}</td>
                    <td>{{$sale->title_ru}}</td>
                    <td>{{$sale->title_kz}}</td>
                    <td>{{$sale->period}}</td>
                    <td>{{$sale->percent}}</td>
                    <td><img src="{{asset('img/sales/'.$sale->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
