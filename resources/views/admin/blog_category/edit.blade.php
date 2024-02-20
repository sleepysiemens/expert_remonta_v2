@extends('Layouts.admin')

@section('title')
    Редактировать категорию блога
@endsection

@section('blog')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.blogCategory.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.blogCategory.update', $item->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Название категории</label>
            <input type="text" class="form-control" placeholder="название" name="name" value="{{$item->name}}" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Название категории КЗ</label>
            <input type="text" class="form-control" placeholder="название" name="name_kz" value="{{$item->name_kz}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">URL</label>
            <input type="text" class="form-control" placeholder="URL" name="url" value="{{$item->url}}" required>
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
              <option value="{{$i->id}}" @selected($item->parent_id == $i->id)>{{$i->name}}</option>
              @foreach($i->childs as $child)
                <option value="{{$child->id}}" @selected($item->parent_id == $child->id)>{{"   --- $child->name"}}</option>
              @endforeach 
              @endforeach
            </select>
          </div>
  
          <fieldset>
            <legend>SEO инфа</legend>
            <div class="form-group">
              <label for="exampleInputEmail1">SEO-заголовок, ru</label>
              <input type="text" class="form-control" placeholder="SEO title" name="seo_title_ru" value="{{$item->seo_title_ru}}" required>
            </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">SEO-заголовок, kz</label>
                  <input type="text" class="form-control" placeholder="SEO title" name="seo_title_kz" value="{{$item->seo_title_kz}}">
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">META-описание, ru</label>
              <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_ru" value="{{$item->meta_desc_ru}}">
            </div>
              <div class="form-group">
                  <label for="exampleInputEmail1">META-описание, kz</label>
                  <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_kz" value="{{$item->meta_desc_kz}}">
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