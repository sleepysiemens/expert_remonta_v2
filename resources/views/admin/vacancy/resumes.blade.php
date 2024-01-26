@extends('Layouts.admin')

@section('title') Отклики (резюме) @endsection

@section('vacancies') active @endsection

@section('content')

  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              {{--<th>Id</th>--}}
              <th>Город</th>
              <th>ФИО</th>
              <th>Email</th>
              <th>Телефон</th>
              <th>Файл с резюме</th>
              <th>Отправлено</th>
              <th>Источник</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($resumes as $r)

              <tr>
                {{--<td>{{$r->id}}</td>--}}
                <td>{{$r->city}}</td>
                <td>{{$r->fio}}</td>
                <td>{{$r->email}}</td>
                <td>{{$r->phone}}</td>
                <td>
                    {{--<a href="{{route('admin.vacancy.getResume', ['resumeFile' => $r->resume_file])}}">
                        Ссылка
                    </a>--}}
                    <form method="post" action="{{route('admin.vacancy.getResume',$r->id)}}">
                        @csrf
                        <button style="border: none; background-color: transparent; color: rgb(12, 64, 220)" onclick="(function() {
                          if(!confirm('Действительно скачать файл с резюме?')) event.preventDefault();
                        })();">Скачать <i class="fas fa-download"></i></button>
                      </form>
                </td>
                <td>{{$r->created_at}}</td>
                <td>{{$r->source}}</td>
                <td>
                  <form method="post" action="{{route('admin.resume.destroy',$r->id)}}">
                    @csrf
                    @method('delete')
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                      if(!confirm('Действительно удалить?')) event.preventDefault();
                    })();"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
            </tr>

              @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <br>
      <br>
      <br>

@endsection
