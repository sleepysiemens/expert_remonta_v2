@extends('Layouts.admin')

@section('title')
    Статья {{$blog->id}}
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

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.blog.edit', $blog->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.blog.destroy',$blog->id)}}">
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
                <th>Название, ru</th>
                <th>Название, kz</th>
                <th>Url</th>
                <th>Описание, ru</th>
                <th>Описание, kz</th>
                <th>Обложка</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->title_ru}}</td>
                    <td>{{$blog->title_kz}}</td>
                    <td>{{$blog->url}}</td>
                    <td>{{$blog->description_ru}}</td>
                    <td>{{$blog->description_kz}}</td>
                    <td>{{$blog->src}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
