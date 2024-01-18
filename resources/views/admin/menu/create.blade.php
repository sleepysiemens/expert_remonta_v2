@extends('Layouts.admin')

@section('title')
    Добавить пункт меню
@endsection

@section('gallery')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.menu.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Название пункта</label>
          <input type="text" class="form-control" placeholder="название" name="title" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">URL</label>
          <input type="text" class="form-control" placeholder="URL" name="url" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Относится к</label>
          <select class="form-control" name="parent_id">
            <option></option>
            @foreach ($menu as $m)
            <option value="{{$m->id}}">{{$m->title}}</option>
            @endforeach
          </select>
        </div>
      </div>
      
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection