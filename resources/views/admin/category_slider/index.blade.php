@extends('Layouts.admin')

@section('title')
    Категории / Слайдер
@endsection

@section('category_slider')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.category_slider.create')}}" class="btn btn-success">
      <i class="fas fa-plus"></i> Добавить
    </a>
  </div>
</div>
<br>

  @foreach ($categories as $category)
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th colspan="8">{{$category->title_ru}}</th>
            </tr>
            <tr>
              <th>Id</th>
              <th>Название</th>
              <th>Изображение</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($CategoryImages as $CategoryImage)

            @if ($CategoryImage->category_id==$category->id)
              <tr>
                <td>{{$CategoryImage->id}}</td>
                <td>{{$CategoryImage->title}}</td>
                <td>{{$CategoryImage->src}}</td>
                  <td><img src="{{asset('img/category_slider/'.$category->id.'/'.$CategoryImage->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                  <td>
                  <form method="post" action="{{route('admin.category_slider.destroy',$CategoryImage->id)}}">
                    @csrf
                    @method('delete')
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
                <td><a href="{{route('admin.category_slider.edit',$CategoryImage->id)}}"><i class="fas fa-pen"></i></a></td>
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
