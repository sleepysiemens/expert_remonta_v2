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
              <th>Название, ru</th>
              <th>Название, kz</th>
              <th>Url</th>
              <th>Описание, ru</th>
              <th>Описание, kz</th>
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
                <td>{{$category->title_ru}}</td>
                <td>{{$category->title_kz}}</td>
                <td>{{$category->url}}</td>
                <td>{!! $category->description_ru !!}</td>
                <td>{!! $category->description_kz !!}</td>
                  <td><img src="{{asset('img/categories/'.$category->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
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
