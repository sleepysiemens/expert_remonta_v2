@extends('Layouts.admin')

@section('title')
    Редактировать статью блога "{{$blog->title_ru}}"
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


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.blog.update', $blog->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Название, ru</label>
            <input type="text" class="form-control" placeholder="Название" name="title_ru" required value="{{$blog->title_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Название, kz</label>
                <input type="text" class="form-control" placeholder="Название" name="title_kz" value="{{$blog->title_kz}}">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Ссылка</label>
            <input type="text" class="form-control" placeholder="Ссылка" name="url" required value="{{$blog->url}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, ru</label>
              <textarea id="summernote" name="description_ru" placeholder="Текст описания..." required>{!!$blog->description_ru !!}</textarea>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Текст, kz</label>
                <textarea id="summernote1" name="description_kz" placeholder="Текст описания...">{!!$blog->description_kz!!}</textarea>
            </div>
          <div class="form-group">

            <label for="exampleInputEmail1">Обложка</label>
              <div style="display: flex; justify-content: start">
                  <input style="width: 50%" type="file" class="form-control" id="imageFile" placeholder="Название" name="src" >
                  <img id="prevImage" style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/blog/'.$blog->src)}}">
              </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Категория статьи</label>
            <select class="form-control" name="category_id" required>
              @foreach ($items as $i)
              <option value="{{$i->id}}" @selected($blog->category_id == $i->id)>{{$i->name}}</option>
              @foreach($i->childs as $child)
                <option value="{{$child->id}}" @selected($blog->category_id == $child->id)>{{"   -- $child->name"}}</option>
                @foreach($child->childs as $child)
                  <option value="{{$child->id}}" @selected($blog->category_id == $child->id)>{{"   ---- $child->name"}}</option>
                @endforeach
              @endforeach
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="active">Добавить в архив?</label>
            <input id="active" type="checkbox" name="active" @checked(!$blog->active)>
        </div>

          <fieldset>
            <legend>SEO инфа</legend>
            <div class="form-group">
              <label for="exampleInputEmail1">SEO-заголовок, ru</label>
              <input type="text" class="form-control" placeholder="SEO title" name="seo_title_ru" value="{{$blog->seo_title_ru}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">SEO-заголовок, kz</label>
              <input type="text" class="form-control" placeholder="SEO title kz" name="seo_title_kz" value="{{$blog->seo_title_kz}}">
            </div>
          <div class="form-group">
              <label for="exampleInputEmail1">META-описание, ru</label>
              <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_ru" value="{{$blog->meta_desc_ru}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">META-описание, kz</label>
              <input type="text" class="form-control" placeholder="Meta desc kz" name="meta_desc_kz" value="{{$blog->meta_desc_kz}}">
          </div>
            
          </fieldset>
          
        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>


@endsection
