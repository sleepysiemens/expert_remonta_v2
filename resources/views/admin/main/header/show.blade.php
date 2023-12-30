@extends('Layouts.admin')

@section('title')
    Заголовок
@endsection

@section('header')
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
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.main.header.edit', $header->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Заголовок, ru</th>
              <th>Заголовок, kz</th>
              <th>Подзаголовок, ru</th>
              <th>Подзаголовок, kz</th>
              <th>Фон</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$header->title_ru}}</td>
                    <td>{{$header->title_kz}}</td>
                    <td>{{$header->subtitle_ru}}</td>
                    <td>{{$header->subtitle_kz}}</td>
                    <td><img src="{{asset('img/main_bg/'.$header->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
