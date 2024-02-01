@extends('Layouts.admin')

@section('title')
    Скидки
@endsection

@section('sales')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.sale.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
      @if(!request()->query('archive'))
        <a href="{{route('admin.sale.index', ['archive' => 1])}}" class="btn btn-info">
          <i class="fas fa-box"></i> Архив
        </a>
      @else
        <a href="{{route('admin.sale.index')}}" class="btn btn-info">
          <i class="fas fa-list"></i> Вернуться к неархивным записям
        </a>
      @endif
    </div>
    @if(request()->query('archive'))
    <div class="col-12">Архивные записи не выводятся на сайте
    </div>
    @endif
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
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($sales as $sale)

                <tr>
                    <td>{{$sale->id}}</td>
                    <td>{{$sale->title_ru}}</td>
                    <td>{{$sale->title_kz}}</td>
                    <td>{{$sale->period}}</td>
                    <td>{{$sale->percent}}</td>
                    <td><img src="{{asset('img/sales/'.$sale->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                    <td>
                      <form method="post" action="{{route('admin.sale.destroy',$sale->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.sale.edit',$sale->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.sale.show',$sale->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
