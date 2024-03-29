@extends('Layouts.admin')

@section('title') Вакансии @endsection

@section('vacancies') active @endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.vacancy.create')}}" class="btn btn-success">
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
              <th>Город</th>
              {{--<th>Категория</th>--}}
              <th>Название, ru/kz</th>
              {{--<th>Название КЗ</th>--}}
              <th>Инфо</th>
              <th>SEO инфа</th>
              {{--<th>URL</th>--}}
              {{--<th>Название, kz</th>--}}
              {{--<th>ЗП</th>
              <th>Опыт</th>
              <th>Занятость</th>--}}
              {{--<th>Телефон</th>--}}
              <th></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($vacancies as $v)

              <tr>
                <td>{{$v->id}}</td>
                <td>{{$v->city->city}}</td>
                {{--<td>{{isset($v->category->name) ? $v->category->name : 'Не определено'}}</td>--}}
                <td>{{$v->name}}/{{$v->name_kz}}</td>
                <td>
                  Категория: {{isset($v->category->name) ? $v->category->name : 'Не определено'}}
                  Телефон: {{$v->phone}}
                  ЗП: {{$v->salary_from}}-{{$v->salary_to}} <br>
                  Опыт: {{$v->experience}} <br>
                  Занятость: {{$v->employment_type}}
                </td>
                    <td>
                      URL: {{$v->url}} <br>
                      Title RU: {{$v->seo_title_ru}} <br>
                      Title KZ: {{$v->seo_title_kz}} <br>
                      Мета описание RU: {{$v->meta_desc_ru}} <br>
                      Мета описание KZ: {{$v->meta_desc_kz}}
                    </td>
                    {{--<td>{{$v->url}}</td>--}}
                {{--<td>{{$v->salary_from}}-{{$v->salary_to}}</td>
                <td>{{$v->experience}}</td>
                <td>{{$v->employment_type}}</td>--}}
                {{--<td>{{$v->phone}}</td>--}}
                <td>
                  <form method="post" action="{{route('admin.vacancy.destroy',$v->id)}}">
                    @csrf
                    @method('delete')
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                      if(!confirm('Действительно удалить вакансию?')) event.preventDefault();
                    })();"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
                <td><a href="{{route('admin.vacancy.edit',$v->id)}}"><i class="fas fa-pen"></i></a></td>
                {{--<td><a href="{{route('admin.vacancy.show',$v->id)}}"><i class="fas fa-arrow-right"></i></a></td>--}}
                <td><a href="{{route('vacancy.show',$v->url)}}"><i class="fas fa-arrow-right"></i></a></td>
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
