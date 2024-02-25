@extends('Layouts.admin')

@section('title')
    Пользователи
@endsection

@section('users')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.user.create')}}" class="btn btn-success">
      <i class="fas fa-plus"></i> Добавить
    </a>
  </div>
</div>


<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Username</th>
              <th>Email</th>
              <th>Role</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    @if(auth()->id() === 1)
                    <td>
                      <form method="post" action="{{route('admin.user.destroy',$user->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                          if(!confirm(`Действительно удалить пользователя? Если он залогинен, он потеряет доступ к админке.`)) event.preventDefault();
                        })();"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.user.edit',$user->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td>
                      <form method="post" action="{{route('admin.user.regen',$user->id)}}">
                        @csrf
                        @method('patch')
                        <button style="border: none; background-color: transparent; color: #333" onclick="(function() {
                          if(!confirm(`Действительно сгенерировать новый пароль?`)) event.preventDefault();
                        })();"><i class="fas fa-unlock"></i></button>
                      </form>
                    </td>
                    @endif
                    {{--<td><a href="{{route('admin.user.show',$user->id)}}"><i class="fas fa-arrow-right"></i></a></td>--}}
                </tr>
        
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection