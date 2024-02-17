@extends('Layouts.admin')

@section('title')
    Заявки
@endsection

@section('applications')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    @if(!request()->query('archive'))
      <a href="{{route('admin.application.index', ['archive' => 1])}}" class="btn btn-info">
        <i class="fas fa-box"></i> Архив
      </a>
    @else
      <a href="{{route('admin.application.index')}}" class="btn btn-info">
        <i class="fas fa-list"></i> Вернуться к неархивным заявкам
      </a>
    @endif
  </div>
  <br>
  {{--<p>Поскольку вы находитесь на домене {{request()->getHttpHost()}} то вы видите
  только заявки, относящиеся к городу {{config('app.city')}} + любые заявки на франшизу.
    Для просмотра заявок для города {{config('app.city_opposite')}} перейдите по ссылке
    <a href="https://{{$oppositeDomain . $_SERVER['REQUEST_URI']}}" target="_blank">
      {{$oppositeDomain . $_SERVER['REQUEST_URI']}}
    </a>
</p>--}}
</div>

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
            <th>Доп инфа</th>
            {{--<th>Email</th>
            <th>Файл с резюме</th>--}}
            <th></th>
          </tr>
      </thead>
      <tbody>

@foreach ($applications as $application)

              <tr>
                <td>{{$application->id}}</td>
                {{--<td>{{$application->created_at}}</td>--}}
                <td>{{$application->date}}</td>
                <td>{{$application->name}}</td>
                <td>{{$application->phone}}</td>
                <td>{{$application->city}}</td>
                <td style="word-break: break-all;max-width:200px">{{$application->sourse}}</td>
                <td>{{\App\Models\FormType::getFormTypeIdAndName($application->sourse)}}</td>
                <td>
                  @if($application->email)Email: {{$application->email}} <br>@endif
                  @if($application->resume_file)
                  Файл с резюме:
                  <form method="post" action="{{route('admin.vacancy.getResume',$application->id)}}">
                    @csrf
                    <button style="border: none; background-color: transparent; color: rgb(12, 64, 220)" onclick="(function() {
                      if(!confirm('Действительно скачать файл с резюме?')) event.preventDefault();
                    })();">Скачать <i class="fas fa-download"></i></button>
                  </form> <br>
                  @endif
                  @if($application->sale) Скидка: {{$application->sale->title_ru}} <br> @endif
                  @if($application->vacancy) 
                    Вакансия: <a href="{{route('vacancy.show', ['vacancy' => $application->vacancy->url])}}">{{$application->vacancy->name}}</a> <br> 
                  @endif
                  @if($application->page) 
                    Страница: <a href="{{route('category.index', [
                      'service' => $application->page->service->url,
                      'category' => $application->page->url,
                      ])}}">{{$application->page->title_ru}}</a> <br> 
                  @endif
                  @if($application->url_query)
                    URL параметры: <br>
                    @foreach(explode('&', $application->url_query) as $queryParam)
                      <b>{{explode('=', $queryParam)[0]}}</b>: 
                      @if(isset(explode('=', $queryParam)[1])) {{explode('=', $queryParam)[1]}} @endif <br>
                    @endForeach
                  @endif
                </td>
                <td>
                  @if(!request()->query('archive'))
                  <form method="post" action="{{route('admin.application.archive',$application->id)}}">
                    @csrf
                    <button style="border: none; background-color: transparent; color: rgb(12, 64, 220)" onclick="(function() {
                      if(!confirm('Действительно перенести заявку в архив?')) event.preventDefault();
                    })();">В архив <i class="fas fa-archive"></i></button>
                  </form>
                  @endif
                  <form method="post" action="{{route('admin.application.destroy',$application->id)}}">
                    @csrf
                    @method('delete')
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                      if(!confirm('Действительно удалить заявку?')) event.preventDefault();
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



@endsection
