@extends('Layouts.admin')

@section('title')
    Статьи
@endsection

@section('blog')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.blog.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
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
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($blogs as $blog)

                <tr>
                    <td>{{$blog->id}}</td>
                    <td>{{$blog->title}}</td>
                    <td>{{$blog->url}}</td>
                    <td>{{$blog->description}}</td>
                    <td>{{$blog->src}}</td>
                    <td>
                      <form method="post" action="{{route('admin.blog.destroy',$blog->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.blog.edit',$blog->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.blog.show',$blog->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>
        
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection