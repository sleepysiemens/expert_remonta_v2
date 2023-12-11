@extends('Layouts.admin')

@section('title')
    Добавить статью
@endsection

@section('blog')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.blog.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Название</label>
          <input type="text" class="form-control" placeholder="Название" name="title" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ссылка</label>
          <input type="text" class="form-control" placeholder="Название" name="url" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст</label>
				<textarea id="summernote" name="description" placeholder="Текст описания..." required></textarea>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Обложка</label>
          <input type="file" class="form-control" placeholder="Название" name="src" required>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection