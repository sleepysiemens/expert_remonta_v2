@extends('Layouts.admin')

@section('title')
    Расценки
@endsection

@section('price')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.price.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить стоимость
      </a>
    </div>
  </div>
  <br>

<div class="row">
    <div class="col-12 table-responsive">

          @php
              $last_category=0;
          @endphp

            @foreach ($prices as $price)
              @if (($price->category)!=$last_category)
                @php
                    $last_category=$price->category;
                @endphp
                <br>
                <br>  
                </tbody>
                </table>

                <table class="table table-striped">
                  <thead>
                      <tr>
                        <th colspan="7">{{$last_category}}</th>
                      </tr>
                      <tr>
                        <th>Id</th>
                        <th>Название</th>
                        <th>Ед. Изм.</th>
                        <th>Цена ₸</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>

                <tr>
                    <td>{{$price->id}}</td>
                    <td>{{$price->title}}</td>
                    <td>{{$price->unit}}</td>
                    <td>{{$price->price}}</td>
                    <td>
                      <form method="post" action="{{route('admin.price.destroy',$price->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.price.edit',$price->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.price.show',$price->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>

              @else
              <tr>
                <td>{{$price->id}}</td>
                <td>{{$price->title}}</td>
                <td>{{$price->unit}}</td>
                <td>{{$price->price}}</td>
                <td>
                  <form method="post" action="{{route('admin.price.destroy',$price->id)}}">
                    @csrf
                    @method('delete')
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
                <td><a href="{{route('admin.price.edit',$price->id)}}"><i class="fas fa-pen"></i></a></td>
                <td><a href="{{route('admin.price.show',$price->id)}}"><i class="fas fa-arrow-right"></i></a></td>
            </tr>

              @endif
        
            @endforeach
    </div>
    <!-- /.col -->
  </div>

@endsection