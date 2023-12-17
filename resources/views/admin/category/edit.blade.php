@extends('Layouts.admin')

@section('title')
    Редактировать категорию
@endsection

@section('categories')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.category.index')}}" class="btn btn-default">
      <i class="fas fa-arrow-left"></i> Назад
  </a>
  </div>
</div>
<br>


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.category.update', $category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Название, ru</label>
            <input type="text" class="form-control" placeholder="Название" name="title_ru" required value="{{$category->title_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Название, kz</label>
                <input type="text" class="form-control" placeholder="Название" name="title_kz" value="{{$category->title_kz}}">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Ссылка</label>
            <input type="text" class="form-control" placeholder="Ссылка" name="url" required value="{{$category->url}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, ru</label>
              <textarea id="summernote" name="description_ru" placeholder="Текст описания..." required>{{$category->description_ru}}</textarea>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Текст, kz</label>
                <textarea id="summernote1" name="description_kz" placeholder="Текст описания..." required>{{$category->description_kz}}</textarea>
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Обложка</label>
            <input type="file" class="form-control" placeholder="Название" name="src">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Относится к</label>
            <select class="form-control" name="service_id" required>
              @foreach ($services as $service)
              <option @if ($service->id==$category->service_id) selected @endif value="{{$service->id}}">{{$service->title}}</option>
              @endforeach
            </select>
          </div>
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
    <br>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">SEO</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @if(isset($seos[0]->id) and $seos[0]->id!=NULL)
        <form action="{{route('admin.seo.update', $seos[0]->id)}}" method="post" enctype="multipart/form-data">
            @else
                <form action="{{route('admin.seo.create')}}" method="post" enctype="multipart/form-data">
                    @endif
        @csrf
        @method('patch')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Страница</label>
                <input type="text" class="form-control" placeholder="Если поле пустое,выберете (относится к)  примените изменения "  name="page" disabled required @if(isset($service[0]->url)and $service[0]->url!=NULL) value="uslugi/{{$service[0]->url.'/'.$category->url}}" @endif >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SEO-заголовок</label>
                <input type="text" class="form-control" placeholder="SEO" name="seo" required value="@if(isset($seos[0]->id) and $seos[0]->id!=NULL){{$seos[0]->seo}}@endif">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">META-описание</label>
                <input type="text" class="form-control" placeholder="Meta" name="meta" required value="@if(isset($seos[0]->id) and $seos[0]->id!=NULL){{$seos[0]->meta}}@endif">
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
    </form>
</div>
@endsection
