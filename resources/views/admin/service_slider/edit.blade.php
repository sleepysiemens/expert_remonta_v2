@extends('Layouts.admin')

@section('title')
    Редактировать категорию
@endsection

@section('service_slider')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.service_slider.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.service_slider.update', $service_slider->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Изображение</label>
                <input type="file" class="form-control" name="src" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Относится к</label>
                <select class="form-control" name="service_id" required>
                    @foreach ($services as $service)
                        <option value="{{$service->id}}">{{$service->title_ru}}</option>
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
