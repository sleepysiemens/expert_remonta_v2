@extends('Layouts.admin')

@section('title')
    Категории
@endsection

@section('categories')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.category.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
    </div>
  </div>
  <br>

  @foreach ($services as $service)
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th colspan="8">{{$service->title}}</th>
            </tr>
            <tr>
              <th>Id</th>
              <th>Название</th>
              <th>Url</th>
              <th>Описание</th>
              <th>Обложка</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)

            @if ($category->service_id==$service->id)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title}}</td>
                <td>{{$category->url}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->src}}</td>
                <td>
                  <form method="post" action="{{route('admin.category.destroy',$category->id)}}">
                    @csrf
                    @method('delete')
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
                <td><a href="{{route('admin.category.edit',$category->id)}}"><i class="fas fa-pen"></i></a></td>
                <td><a href="{{route('admin.category.show',$category->id)}}"><i class="fas fa-arrow-right"></i></a></td>
            </tr>
            @endif
          
              @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <br>
      <br>
      <br>
  @endforeach

@endsection
