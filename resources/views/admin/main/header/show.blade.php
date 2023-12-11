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
              <th>Заголовок</th>
              <th>Подзаголовок</th>
              <th>Фон</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$header->title}}</td>
                    <td>{{$header->subtitle}}</td>
                    <td>{{$header->src}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection