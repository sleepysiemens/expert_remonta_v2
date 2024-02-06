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
            <th>Тип заявки</th>
            <th>Email</th>
            <th>Файл с резюме</th>
            <th></th>
          </tr>
      </thead>
      <tbody>

@foreach ($applications as $application)

              <tr>
                <td>{{$application->id}}</td>
                <td>{{$application->created_at}}</td>
                <td>{{$application->name}}</td>
                <td>{{$application->phone}}</td>
                <td>{{$application->city}}</td>
                <td>{{$application->sourse}}</td>
                <td>{{\App\Models\FormType::getFormTypeIdAndName($application->sourse)}}</td>
                <td>{{$application->email}}</td>
                <td>{{--{{$application->resume_file}}--}}
                  @if($application->resume_file)
                  <form method="post" action="{{route('admin.vacancy.getResume',$application->id)}}">
                    @csrf
                    <button style="border: none; background-color: transparent; color: rgb(12, 64, 220)" onclick="(function() {
                      if(!confirm('Действительно скачать файл с резюме?')) event.preventDefault();
                    })();">Скачать <i class="fas fa-download"></i></button>
                  </form>
                  @endif
                </td>
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
