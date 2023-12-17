@extends('Layouts.admin')

@section('title')
    Добавить категорию
@endsection

@section('categories')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Название, ru</label>
          <input type="text" class="form-control" placeholder="Название" name="title_ru" required>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Название, kz</label>
              <input type="text" class="form-control" placeholder="Название" name="title_kz">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ссылка</label>
          <input type="text" class="form-control" placeholder="Ссылка" name="url" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст, ru</label>
              <textarea id="summernote" name="description_ru" placeholder="Текст описания..." required></textarea>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, kz</label>
              <textarea id="summernote1" name="description_kz" placeholder="Текст описания..."></textarea>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Обложка</label>
          <input type="file" class="form-control" placeholder="Название" name="src" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Относится к</label>
          <select class="form-control" name="service_id" required>
            @foreach ($services as $service)
            <option value="{{$service->id}}">{{$service->title}}</option>
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
