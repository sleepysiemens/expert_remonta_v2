@extends('Layouts.admin')

@section('title')
    Статьи блога
@endsection

@section('blog')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.blog.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
      @if(!request()->query('archive'))
        <a href="{{route('admin.blog.index', ['archive' => 1])}}" class="btn btn-info">
          <i class="fas fa-box"></i> Архив
        </a>
      @else
        <a href="{{route('admin.blog.index')}}" class="btn btn-info">
          <i class="fas fa-list"></i> Вернуться к неархивным записям
        </a>
      @endif
    </div>
    @if(request()->query('archive'))
    <div class="col-12">Архивные записи не выводятся на сайте</div>
    @endif
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
              <th>Url</th>
              <th>Описание, ru/kz</th>
              <th>Обложка</th>
              <th>SEO инфа и прочее</th>
              <th></th>
            </tr>
        </thead>
        <tbody>
          @foreach ($items as $category)

              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->title_ru}}/{{$category->title_kz}}</td>
                <td style="max-width:100px;word-wrap:break-word">{{$category->url}}</td>
                {{--<td>{!! $category->description_ru !!}</td>--}}
                <td>
                  {{ $category->description_ru ? mb_strlen($category->description_ru) . " символов" : 'Нет'}}
                  / {{ $category->description_kz ? mb_strlen($category->description_kz) . " символов" : 'Нет'}}
                </td>
                {{--<td>{!! $category->description_kz !!}</td>--}}
                <td><img src="{{asset('img/blog/'.$category->src)}}" style="height: 150px; width: 150px; object-fit: contain"></td>
                <td>
                  Короткое название: {{$category->short_title_ru}} <br>
                  Категория: {{$category->category->name}} <br>
                  Title RU: {{$category->seo_title_ru}} <br>
                  Title KZ: {{$category->seo_title_kz}} <br>
                  Мета описание RU: {{mb_strlen($category->meta_desc_ru)}} симв. <br>
                  Мета описание KZ: {{mb_strlen($category->meta_desc_kz)}} симв.
                </td>
                <td>
                  <form method="post" action="{{route('admin.blog.destroy',$category->id)}}">
                    @csrf
                    @method('delete')
                    <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                      if(!confirm('Действительно удалить эту статью блога?')) event.preventDefault();
                    })();"><i class="far fa-trash-alt"></i></button>
                  </form>
                </td>
                <td><a href="{{route('admin.blog.edit',$category->id)}}"><i class="fas fa-pen"></i></a></td>
                {{--<td><a href="{{route('admin.blog.show',$category->id)}}"><i class="fas fa-arrow-right"></i></a></td>--}}
            </tr>
            @if($category->wishes)
            <tr>
              <td colspan="6">Обратная связь от админа по статье {{$category->title_ru}}: {{$category->wishes}}</td>
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

@endsection
