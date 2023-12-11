@extends('Layouts.admin')

@section('title')
    Услуги
@endsection

@section('services')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.service.create')}}" class="btn btn-success">
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

            @foreach ($services as $service)

                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->title}}</td>
                    <td>{{$service->url}}</td>
                    <td>{{$service->description}}</td>
                    <td>{{$service->src}}</td>
                    <td>
                      <form method="post" action="{{route('admin.service.destroy',$service->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.service.edit',$service->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.service.show',$service->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>
        
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection