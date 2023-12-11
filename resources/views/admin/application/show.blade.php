@extends('Layouts.admin')

@section('title')
    Заявка {{$application->id}}
@endsection

@section('applications')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.application.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.application.edit', $application->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.application.destroy',$application->id)}}">
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
              <th>Имя пользователя</th>
              <th>Телефон</th>
              <th>Дата</th>
              <th>Город</th>
              <th>Источник</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                  <td>{{$application->id}}</td>
                  <td>{{$application->username}}</td>
                  <td>{{$application->phone}}</td>
                  <td>{{$application->date_time}}</td>
                  <td>{{$application->city}}</td>
                  <td>{{$application->sourse}}</td>
                  
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection