@extends('Layouts.admin')

@section('title')
    Редактировать SEO
@endsection

@section('seo')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.seo.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.seo.update', $seo->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Страница</label>
            <input type="text" class="form-control" placeholder="Страница" name="page" required value="{{$seo->page}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">SEO-заголовок, ru</label>
            <input type="text" class="form-control" placeholder="SEO" name="seo_ru" required value="{{$seo->seo_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SEO-заголовок, kz</label>
                <input type="text" class="form-control" placeholder="SEO" name="seo_kz" value="{{$seo->seo_kz}}">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">META-описание, ru</label>
            <input type="text" class="form-control" placeholder="Meta" name="meta_ru" required value="{{$seo->meta_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">META-описание, kz</label>
                <input type="text" class="form-control" placeholder="Meta" name="meta_kz" value="{{$seo->meta_kz}}">
            </div>
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection
