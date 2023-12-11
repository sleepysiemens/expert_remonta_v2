@extends('Layouts.admin')

@section('title')
    Категория {{$category->id}}
@endsection

@section('category_slider')
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

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.category.edit', $category->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.category.destroy',$category->id)}}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-primary float-right" style="margin-left: 10px; background-color: rgb(196, 3, 3); border: rgb(196, 3, 3)">
            <i class="far fa-trash-alt"></i></i> Удалить
        </button>
      </form>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Название</th>
              <th>Url</th>
              <th>Описание</th>
              <th>Обложка</th>
              <th>Относится к</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->title}}</td>
                  <td>{{$category->url}}</td>
                  <td>{{$category->description}}</td>
                  <td>{{$category->src}}</td>
                  @foreach ($service as $service1)
                  <td><a href="{{route('admin.service.show',$service1->id)}}">{{$service1->title}}</a></td>
                  @endforeach
                  
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection