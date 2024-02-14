@extends('Layouts.admin')

@section('title')
    Города
@endsection

@section('cities')
    active
@endsection

@section('content')

{{--<div class="row">
    <div class="col-12">
      <a href="{{route('admin.menu.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
    </div>
  </div>
  <br>--}}

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              {{--<th>Id</th>--}}
              <th>Город ru/en</th>
              <th>Занято для франшизы?</th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($items as $i)

                <tr>
                    <td>{{$i->city}}/{{$i->city_en}}</td>
                    <td>{{$i->fr_busy ? 'Да' : 'Нет'}}</td>
                    <td><a href="{{route('admin.city.edit',$i->id)}}"><i class="fas fa-pen"></i></a></td>
                    {{--<td>
                      <form method="post" action="{{route('admin.menu.destroy',$m->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                          if(!confirm('Действительно удалить?')) event.preventDefault();
                        })();"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>--}}
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
