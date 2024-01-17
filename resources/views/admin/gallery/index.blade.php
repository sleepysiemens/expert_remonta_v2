@extends('Layouts.admin')

@section('title')
    Галерея
@endsection

@section('gallery')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.gallery.create')}}" class="btn btn-success">
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
              <th>Alt</th>
              <th>Фото</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($galleries as $gallery)

                <tr>
                    <td>{{$gallery->id}}</td>
                    <td>{{$gallery->title}}</td>
                    <td><img src="{{asset('img/gallery/'.$gallery->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                    <td>
                      <form method="post" action="{{route('admin.gallery.destroy',$gallery->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    {{--<td><a href="{{route('admin.gallery.edit',$gallery->id)}}"><i class="fas fa-pen"></i></a></td>--}}
                    <td><a href="{{route('admin.gallery.show',$gallery->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
