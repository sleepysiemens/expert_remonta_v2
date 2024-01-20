@extends('Layouts.admin')

@section('title')
    Страницы услуг
@endsection

@section('service_pages')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.page.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
    </div>
  </div>
  <br>

  @foreach ($services as $service)
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th colspan="8">{{$service->title_ru}}</th>
            </tr>
            <tr>
              <th>Id</th>
              <th>Название, ru</th>
              <th>Название, kz</th>
              <th>Url</th>
              <th>Описание, ru</th>
              <th>Описание, kz</th>
              <th>Обложка</th>
              <th>SEO инфа</th>
              <th>Кол-во слайдов</th>
              <th></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($categories as $category)

            @if ($category->service_id==$service->id)
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title_ru}}</td>
                <td>{{$category->title_kz}}</td>
                <td>{{$category->url}}</td>
                <td>{!! $category->description_ru !!}</td>
                <td>{!! $category->description_kz !!}</td>
                <td><img src="{{asset('img/categories/'.$category->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                <td>
                  Title RU: {{$category->seo_title_ru}} <br>
                  Title KZ: {{$category->seo_title_kz}} <br>
                  Мета описание RU: {{$category->meta_desc_ru}} <br>
                  Мета описание KZ: {{$category->meta_desc_kz}}
                </td>
                <td>{{count($category->slides)}}</td>
                <td>
                  <form method="post" action="{{route('admin.page.destroy',$category->id)}}">
                    @csrf
                    @method('delete')
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                      if(!confirm('Действительно удалить страницу услуги? Она будет удалена вместе с SEO инфой о странице и слайдами (если они есть)')) event.preventDefault();
                    })();"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
                <td><a href="{{route('admin.page.edit',$category->id)}}"><i class="fas fa-pen"></i></a></td>
                <td><a href="{{route('admin.page.show',$category->id)}}"><i class="fas fa-arrow-right"></i></a></td>
            </tr>
            @endif

              @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <br>
      <br>
      <br>
  @endforeach

@endsection
