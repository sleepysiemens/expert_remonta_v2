@extends('Layouts.admin')

@section('title')
    Добавить категорию блога
@endsection

@section('blog')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.blogCategory.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Название категории</label>
          <input type="text" class="form-control" placeholder="название" name="name" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Название категории КЗ</label>
          <input type="text" class="form-control" placeholder="название" name="name_kz">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">URL</label>
          <small>* если не заполнить, сгенерируется автоматически из названия</small>
          <input type="text" class="form-control" placeholder="URL" name="url">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Обложка</label>
          <input type="file" class="form-control" placeholder="Название" name="thumb">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Относится к</label>
          <select class="form-control" name="parent_id">
            <option></option>
            @foreach ($items as $i)
            <option value="{{$i->id}}">{{$i->name}}</option>
            @foreach($i->childs as $child)
              <option value="{{$child->id}}">{{"   --- $child->name"}}</option>
            @endforeach 
            @endforeach
          </select>
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
  </div>
@endsection