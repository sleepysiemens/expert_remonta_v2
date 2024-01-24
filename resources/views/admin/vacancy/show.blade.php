@extends('Layouts.admin')

@section('title')
    Страница услуги {{$category->title_ru}} (id: {{$category->id}})
@endsection

@section('service_pages')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.page.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.page.edit', $category->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.page.destroy',$category->id)}}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-primary float-right" style="margin-left: 10px; background-color: rgb(196, 3, 3); border: rgb(196, 3, 3)"
        onclick="(function() {
          if(!confirm('Действительно удалить страницу услуги? Она будет удалена вместе с SEO инфой о странице и слайдами (если они есть)')) event.preventDefault();
        })();">
            <i class="far fa-trash-alt"></i></i> Удалить
        </button>
      </form>
      <a href="{{route('category.index', ['service' => $category->service->url, 'category' => $category->url])}}" class="btn btn-info" style="margin-left:10px">
        <i class="fas fa-eye"></i> Посмотреть на сайте
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
                <th>Название, ru</th>
                <th>Название, kz</th>
                <th>Url</th>
                <th>Описание, ru</th>
                <th>Описание, kz</th>
                <th>Обложка</th>
              <th>Относится к</th>
              <th>SEO инфа</th>
              <th>Кол-во слайдов</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{$category->title_ru}}</td>
                  <td>{{$category->title_kz}}</td>
                  <td>{{$category->url}}</td>
                  <td>{!! $category->description_ru !!}</td>
                  <td>{!! $category->description_kz !!}</td>
                    <td><img src="{{asset('img/categories/'.$category->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                  @foreach ($service as $service1)
                  <td><a href="{{route('admin.service.show',$service1->id)}}">{{$service1->title}}</a></td>
                  @endforeach
                  <td>
                    Title RU: {{$category->seo_title_ru}} <br>
                    Title KZ: {{$category->seo_title_kz}} <br>
                    Мета описание RU: {{$category->meta_desc_ru}} <br>
                    Мета описание KZ: {{$category->meta_desc_kz}}
                  </td>
                  <td>{{count($category->slides)}}</td>

                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
    @if(count($category->slides) > 0)
      <div class="col-12">
        <h3>Слайды для этой страницы ({{count($category->slides)}})</h3>
        <div class="row">
        @foreach($category->slides as $slide)
          <div class="col-2">
            <img src="{{asset('img/category_slider/'."$category->id/".$slide->src)}}" alt="" width="200">
            <br>
            <span @if($slide->size > 250) style="color: rgb(196, 3, 3);" @endif>{{$slide->size}} КБ</span>
            <form method="post" action="{{route('admin.page.destroySlider',$slide->id)}}">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-primary float-right" style="margin-left: 10px; background-color: rgb(196, 3, 3); border: rgb(196, 3, 3)"
              onclick="(function() {
                if(!confirm('Действительно удалить этот слайд?')) event.preventDefault();
              })();">
                  <i class="far fa-trash-alt"></i></i>
              </button>
            </form>
          </div>
        @endforeach
        @if($hasBigSize)
          <div>Размер неоторых слайдов превышает 250 килобайт. Тяжелые картинки могут негативно сказаться на скорости загрузки страницы. Вот что можно сделать: <br>
            - проверьте расширение изображения, лучше загружать в формате jpg, а не png <br>
            - проверьте размеры изображения. для сайта нужно максимум 1920 пикселей в ширину. если изображение больше, уменьшите размер <br>
            - оптимизируйте изображение, сожмите без потери или с незначительной потерей качества. <br>
            <a href="https://imageresizer.com/" target="_blank">Imageresizer</a> - отличный онлайн сервис для быстрого сжатия и уменьшения размеров изображений
          </div>
         @endif
        </div>
      </div>
    @endif
    
  </div>


@endsection
