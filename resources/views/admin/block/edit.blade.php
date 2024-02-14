@extends('Layouts.admin')

@section('title')
    Редактировать блок
@endsection

@section('block')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.blocks.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.blocks.update', $block->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
          
          <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" class="form-control" placeholder="название" name="name" value="{{$block->name}}">

          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Название EN</label>
            <input type="text" class="form-control" placeholder="название" name="code_name" value="{{$block->code_name}}">
          </div>
  
          <div class="form-group">
            <label for="exampleInputEmail1">Код</label>
            <textarea id="summernote1" name="code" placeholder="Код...">{!!$block->code!!}</textarea>
        </div>

         
  
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection