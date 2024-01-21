@extends('Layouts.admin')

@section('title')
    Заявки
@endsection

@section('applications')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12 table-responsive">
    <table class="table table-striped">
      <thead>
          <tr>
            <th>Id</th>
            <th>Дата создания</th>
            <th>Имя пользователя</th>
            <th>Телефон</th>
            <th>Город</th>
            <th>Источник</th>
            <th></th>
          </tr>
      </thead>
      <tbody>

@foreach ($applications as $application)

              <tr>
                <td>{{$application->id}}</td>
                <td>{{$application->created_at}}</td>
                <td>{{$application->username}}</td>
                <td>{{$application->phone}}</td>
                <td>{{$application->city}}</td>
                <td>{{$application->sourse}}</td>
                <td>
                  <form method="post" action="{{route('admin.application.destroy',$application->id)}}">
                    @csrf
                    @method('delete')
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>

@endforeach

      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>



@endsection
