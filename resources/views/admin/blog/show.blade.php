@extends('Layouts.admin')

@section('title')
    Статья блога {{$blog->title_ru}} (id: {{$blog->id}})
@endsection

@section('blog')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.blog.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.blog.edit', $blog->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.blog.destroy',$blog->id)}}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-primary float-right" style="margin-left: 10px; background-color: rgb(196, 3, 3); border: rgb(196, 3, 3)"
        onclick="(function() {
          if(!confirm('Действительно удалить?')) event.preventDefault();
        })();">
            <i class="far fa-trash-alt"></i></i> Удалить
        </button>
      </form>
      {{--<a href="{{route('category.index', ['service' => $category->service->url, 'category' => $category->url])}}" class="btn btn-info" style="margin-left:10px">
        <i class="fas fa-eye"></i> Посмотреть на сайте
      </a>--}}
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
                {{--<th>Url</th>--}}
                <th>Обложка</th>
              <th>Категория</th>
              <th>SEO инфа</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                  <td>{{$blog->id}}</td>
                  <td>{{$blog->title_ru}}/{{$blog->title_kz}}</td>

                    <td><img src="{{asset('img/blog/'.$blog->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>

                  <td>
                    Категория: {{$blog->category->name}} <br>
                    URL: {{$blog->url}} <br>
                    Title RU: {{$blog->seo_title_ru}} <br>
                    Title KZ: {{$blog->seo_title_kz}} <br>
                    Мета описание RU: {{$blog->meta_desc_ru}} <br>
                    Мета описание KZ: {{$blog->meta_desc_kz}}
                  </td>

                </tr>


        </tbody>
      </table>
    </div>

    <div class="col-12"><h3>Описание RU</h3>{!! $blog->description_ru !!}</div>
    <div class="col-12"><h3>Описание KZ</h3>{!! $blog->description_kz !!}</div>
    <!-- /.col -->

    
  </div>


@endsection
