@extends('Layouts.admin')

@section('title')
    Редактировать пользователя
@endsection

@section('users')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.user.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.user.update', $user->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" placeholder="Username" name="name" required value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" required value="{{$user->email}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Роль</label>
            <select class="form-control" name="role" required>
              <option value="user">user</option>
              <option value="admin">admin</option>
              <option value="redactor">redactor</option>
            </select>
          </div>
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection
