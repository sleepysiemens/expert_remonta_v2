@extends('Layouts.admin')

@section('title')
    Редактировать категорию
@endsection

@section('category_slider')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.category_slider.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.category_slider.update', $category_slider->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Изображение</label>
                <div style="display: flex; justify-content: start">
                    <input style="width: 50%" type="file" class="form-control" id="imageFile" placeholder="Название" name="src" required>
                    <img id="prevImage" style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/category_slider/'.$category_slider->category_id.'/'.$category_slider->src)}}">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Относится к</label>
                <select class="form-control" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title_ru}}</option>
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
