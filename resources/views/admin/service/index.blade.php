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
              <th>Название, ru/kz</th>
              {{--<th>Название, kz</th>--}}
              <th>Url</th>
              <th>Описание, ru/kz</th>
              {{--<th>Описание, kz</th>--}}
              <th>Обложка</th>
              <th>SEO инфа</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($services as $service)

                <tr>
                    <td>{{$service->id}}</td>
                    <td>{{$service->title_ru}}/{{$service->title_kz}}</td>
                    {{--<td>{{$service->title_kz}}</td>--}}
                    <td>{{$service->url}}</td>
                    <td>{{($service->description_ru ? mb_strlen($service->description_ru) . ' символов' : 'Нет ')}}
                      /{{$service->description_kz ? mb_strlen($service->description_kz) . ' символов' : 'Нет'}} </td>
                    {{--<td>{{$service->description_kz ? mb_strlen($service->description_kz) . ' символов' : 'Нет'}}</td>--}}
                    <td><img src="{{asset('img/services/'.$service->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                    <td>
                      Title RU: {{$service->seo_title_ru}} <br>
                      Title KZ: {{$service->seo_title_kz}} <br>
                      Мета описание RU: {{$service->meta_desc_ru}} <br>
                      Мета описание KZ: {{$service->meta_desc_kz}}
                    </td>
                    <td>
                      <form method="post" action="{{route('admin.service.destroy',$service->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                          if(!confirm('Действительно удалить?')) event.preventDefault();
                        })();"><i class="far fa-trash-alt"></i></button>
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
