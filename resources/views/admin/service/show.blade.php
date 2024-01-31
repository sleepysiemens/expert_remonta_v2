@extends('Layouts.admin')

@section('title')
    Услуга {{$service->id}}
@endsection

@section('services')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.service.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.service.edit', $service->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.service.destroy',$service->id)}}">
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
              <th>Название, ru</th>
              <th>Название, kz</th>
              <th>Url</th>
              <th>Описание, ru</th>
              <th>Описание, kz</th>
              <th>Обложка</th>
              <th>SEO инфа</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                  <td>{{$service->id}}</td>
                  <td>{{$service->title_ru}}</td>
                  <td>{{$service->title_kz}}</td>
                  <td>{{$service->url}}</td>
                  <td>{{$service->description_ru}}</td>
                  <td>{{$service->description_kz}}</td>
                    <td><img src="{{asset('img/services/'.$service->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                    <td>
                      Title RU: {{$service->seo_title_ru}} <br>
                      Title KZ: {{$service->seo_title_kz}} <br>
                      Мета описание RU: {{$service->meta_desc_ru}} <br>
                      Мета описание KZ: {{$service->meta_desc_kz}}
                    </td>
                  </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
