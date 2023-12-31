@extends('Layouts.admin')

@section('title')
    Редактировать "О нас"
@endsection

@section('about')
    active
@endsection

@section('dropdown')
    display:block;
@endsection

@section('menu-dropdown')
    menu-open
@endsection

@section('content')


<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Текст, ru</th>
              <th>Текст, kz</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($abouts as $about)

                <tr>
                    <td>{{$about->id}}</td>
                    <td>{{$about->title_ru}}</td>
                    <td>{{$about->title_kz}}</td>
                    <td>{{$about->src}}</td>

                    <td><a href="{{route('admin.main.about.edit',$about->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.main.about.show',$about->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
