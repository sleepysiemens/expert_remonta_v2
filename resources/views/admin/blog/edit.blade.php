@extends('Layouts.admin')

@section('title')
    Редактировать статью блога "{{$blog->title_ru}}"
@endsection

@section('blog')
    active
@endsection

@section('body_class')
  sidebar-collapse
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
    <form action="{{route('admin.blog.update', $blog->id)}}" method="post" enctype="multipart/form-data"
      style="display:flex;gap:25px">
        
        <div class="card-body" style="flex-basis:75%">
          @csrf
          @method('patch')
          <div class="form-group">
            <label for="exampleInputEmail1">Название, ru</label>
            <input type="text" class="form-control" placeholder="Название" name="title_ru" required value="{{$blog->title_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Название, kz</label>
                <input type="text" class="form-control" placeholder="Название" name="title_kz" value="{{$blog->title_kz}}">
            </div>

            <div style="display:flex;gap:25px;align-items:center">
              <p class="hint">Для вывода в хлебных <br> крошках и сайдбаре</p>
            <div class="form-group">
              <label for="exampleInputEmail1">Короткое название, ru</label>
              <input type="text" class="form-control" placeholder="Название" name="short_title_ru" value="{{$blog->short_title_ru}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Короткое Название, kz</label>
              <input type="text" class="form-control" placeholder="Название" name="short_title_kz" value="{{$blog->short_title_kz}}">
            </div>
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
          {{--<div class="form-group">

            <label for="exampleInputEmail1">Обложка</label>
              <div style="display: flex; justify-content: start">
                  <input style="width: 50%" type="file" class="form-control" id="imageFile" placeholder="Название" name="src" >
                  <img id="prevImage" style="height: 100px; width: 100px; object-fit: contain" src="{{asset('img/blog/'.$blog->src)}}">
              </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Категория статьи</label>
            <select class="form-control" name="category_id" id="category_id" required>
              @foreach ($items as $i)
              <option value="{{$i->id}}" @disabled(true) @selected($blog->category_id == $i->id)>{{$i->name}}</option>
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
        </div>--}}

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

          @if($blog->wishes)
            <p>Пожелания от админа по данной статье:</p>
            Статья понравилась: {{$blog->grade ? 'Да' : 'Нет'}} <br>
            <p>{{$blog->wishes}}</p>
          @endif
          
        </div>
      <!-- /.card-body -->
      <div class="card-footer" style="flex-basis:30%">
        <div id="card_right">
        <div class="form-group">

          <label for="exampleInputEmail1">Обложка</label>
            <div style="">
                <input style="width: 100%" type="file" class="form-control" id="imageFile" placeholder="Название" name="src" >
                <br>
                <img id="prevImage" style="height: auto; width: 100px; object-fit: contain;display:block" src="{{asset('img/blog/'.$blog->src)}}">
            </div>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Категория статьи</label>
          <select class="form-control" name="category_id" id="category_id" required>
            @foreach ($items as $i)
            <option value="{{$i->id}}" @disabled(true) @selected($blog->category_id == $i->id)>{{$i->name}}</option>
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
        <button type="submit" class="btn btn-primary" id="submit_btn">Изменить</button>
      </div>
      </div>
    </form>
  </div>


@endsection

@push('customScripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const options = {
      itemSelectText: '',
      shouldSort: false
    }
    const element = document.querySelector('#category_id');
    const choices = new Choices(element, options);

    $(window).scroll(function(){
        var ScrollTop = parseInt($(window).scrollTop());
        //console.log(ScrollTop);
        let el = document.getElementById('card_right');

        if (ScrollTop > 250) {
            //alert("Scroll is greater than 100");
            el.style.position = 'sticky'
            el.style.top = '10px'
            el.style.right = '0px'
        } else {
          el.style.position = 'static'
        }
    });

  })
  </script>
@endPush
