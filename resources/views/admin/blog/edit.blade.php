@extends('Layouts.admin')

@section('title')
    Редактировать статью
@endsection

@section('blog')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.blog.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.blog.update', $blog->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Название, ru</label>
            <input type="text" class="form-control" placeholder="Название" name="title_ru" required value="{{$blog->title_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Название, kz</label>
                <input type="text" class="form-control" placeholder="Название" name="title_kz" value="{{$blog->title_kz}}">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Ссылка</label>
            <input type="text" class="form-control" placeholder="Название" name="url" required value="{{$blog->url}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, ru</label>
				<textarea id="summernote" name="description_ru" placeholder="Текст описания..." required>{{$blog->description_ru}}</textarea>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Текст, kz</label>
                <textarea id="summernote" name="description_kz" placeholder="Текст описания...">{{$blog->description_kz}}</textarea>
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Обложка</label>
            <input type="file" class="form-control" placeholder="Название" name="src">
          </div>
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection
