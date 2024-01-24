@extends('Layouts.admin')

@section('title')
    Категории вакансий
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.vc.create')}}" class="btn btn-success">
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
              <th>Id</th>
              <th>Имя</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($vcs as $v)

                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->name}}</td>
                    <td><a href="{{route('admin.vc.edit',$v->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td>
                      <form method="post" action="{{route('admin.vc.destroy',$v->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                          if(!confirm('Действительно удалить?')) event.preventDefault();
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
