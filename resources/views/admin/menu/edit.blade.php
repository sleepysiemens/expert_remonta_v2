@extends('Layouts.admin')

@section('title')
    Редактировать пункт меню
@endsection

@section('menu')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.menu.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.menu.update', $menu->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" class="form-control" placeholder="Название" name="title" required value="{{$menu->title}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">URL</label>
            <input type="text" class="form-control" placeholder="URL" name="url" required value="{{$menu->url}}">
          </div>
  
          <div class="form-group">
            <label for="exampleInputEmail1">Относится к</label>
            <select class="form-control" name="parent_id">
              <option></option>
              @foreach ($menuItems as $m)
              <option value="{{$m->id}}">{{$m->title}}</option>
              @endforeach
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