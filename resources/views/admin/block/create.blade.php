@extends('Layouts.admin')

@section('title')
    Добавить блок
@endsection

@section('block')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.blocks.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Название</label>
          <input type="text" class="form-control" placeholder="название" name="name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Название EN</label>
          <input type="text" class="form-control" placeholder="название" name="code_name">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Код</label>
          @if(config('app.city') === 'Астана')
          <textarea id="summernote1" name="code" placeholder="Код...">{!!old('code')!!}</textarea>
          @else
          <textarea id="summernote1" name="code_almaty" placeholder="Код...">{!!old('code_almaty')!!}</textarea>
          @endif
        </div>

      </div>
      
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection