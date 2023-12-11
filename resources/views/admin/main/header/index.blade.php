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
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Заголовок</th>
              <th>Позаголовок</th>
			<th>Фон</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($headers as $header)

                <tr>
                    <td>{{$header->id}}</td>
                    <td>{{$header->title}}</td>
                    <td>{{$header->subtitle}}</td>
                    <td>{{$header->src}}</td>

                    
                    <td><a href="{{route('admin.main.header.edit',$header->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.main.header.show',$header->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>
        
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection