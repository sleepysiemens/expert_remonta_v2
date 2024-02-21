@extends('Layouts.admin')

@section('title')
    Добавить статью в блог
@endsection

@section('blog')active @endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.blog.store')}}" method="post" class="dropzone" id="my-dropzone" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Название, ru</label>
          <input type="text" class="form-control" placeholder="Название" name="title_ru" value="{{old('title_ru')}}" required>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Название, kz</label>
              <input type="text" class="form-control" placeholder="Название" name="title_kz" value="{{old('title_kz')}}">
          </div>
          <div style="display:flex;gap:25px;align-items:center">
            <p class="hint">Для вывода в хлебных <br> крошках и сайдбаре</p>
          <div class="form-group">
            <label for="exampleInputEmail1">Короткое название, ru</label>
            <input type="text" class="form-control" placeholder="Название" name="short_title_ru" value="{{old('short_title_ru')}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Короткое Название, kz</label>
            <input type="text" class="form-control" placeholder="Название" name="short_title_kz" value="{{old('short_title_kz')}}">
          </div>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Ссылка</label>
          <input type="text" class="form-control" placeholder="Ссылка" name="url" value="{{old('url')}}" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст, ru</label>
              <textarea id="summernote" name="description_ru" placeholder="Текст описания..." required>{!!old('description_ru')!!}</textarea>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, kz</label>
              <textarea id="summernote1" name="description_kz" placeholder="Текст описания...">{!!old('description_kz')!!}</textarea>
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Обложка</label>
          <input type="file" class="form-control" placeholder="Название" name="src" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Категория статьи</label>
          <select class="form-control" name="category_id" required>
            @foreach ($items as $i)
            <option value="{{$i->id}}">{{$i->name}}</option>
            @foreach($i->childs as $child)
              <option value="{{$child->id}}">{{"   -- $child->name"}}</option>
              @foreach($child->childs as $child)
                <option value="{{$child->id}}">{{"   ---- $child->name"}}</option>
              @endforeach
            @endforeach
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="active">Добавить в архив?</label>
          <input id="active" type="checkbox" name="active">
        </div>

        <fieldset>
          <legend>SEO инфа</legend>
          <div class="form-group">
            <label for="exampleInputEmail1">SEO-заголовок, ru</label>
            <input type="text" class="form-control" placeholder="SEO title" name="seo_title_ru" value="{{old('seo_title_ru')}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SEO-заголовок, kz</label>
                <input type="text" class="form-control" placeholder="SEO title" name="seo_title_kz" value="{{old('seo_title_kz')}}">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">META-описание, ru</label>
            <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_ru" value="{{old('meta_desc_ru')}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">META-описание, kz</label>
                <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_kz" value="{{old('meta_desc_kz')}}">
            </div>
          
        </fieldset>

      </div>

      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
    {{--<button type="submit" class="btn btn-primary">Добавить</button>--}}
  </div>
@endsection

