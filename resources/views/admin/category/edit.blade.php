@extends('Layouts.admin')

@section('title')
    Редактировать категорию
@endsection

@section('categories')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.category.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Название</label>
            <input type="text" class="form-control" placeholder="Название" name="title" required value="{{$category->title}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Ссылка</label>
            <input type="text" class="form-control" placeholder="Ссылка" name="url" required value="{{$category->url}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст</label>
              <textarea id="summernote" name="description" placeholder="Текст описания..." required>{{$category->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Обложка</label>
            <input type="file" class="form-control" placeholder="Название" name="src">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Относится к</label>
            <select class="form-control" name="service_id" required>
              @foreach ($services as $service)
              <option @if ($service->id==$category->service_id) selected @endif value="{{$service->id}}">{{$service->title}}</option>
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