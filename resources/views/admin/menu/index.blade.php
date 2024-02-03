@extends('Layouts.admin')

@section('title')
    Меню
@endsection

@section('menu')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.menu.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
    </div>
  </div>
  <br>

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              {{--<th>Id</th>--}}
              <th>Пункт ru/kz</th>
              <th>URL</th>
              <th>Родительский пункт</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($menu as $m)

                <tr>
                    <td>{{$m->title}} @if($m->title_kz)/{{$m->title_kz}}@endif</td>
                    <td>{{$m->url}}</td>
                    <td>
                      @if($m->parent_id) {{$m->parent->title}} @endif
                    </td>
                    <td><a href="{{route('admin.menu.edit',$m->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td>
                      <form method="post" action="{{route('admin.menu.destroy',$m->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                          if(!confirm('Действительно удалить этот пункт меню?')) event.preventDefault();
                        })();"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
