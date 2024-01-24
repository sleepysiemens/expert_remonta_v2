@extends('Layouts.admin')

@section('title') Редактировать вакансию {{$vacancy->id}} @endsection

@section('vacancies')active @endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.vacancy.update', $vacancy)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Город</label>
          <select class="form-control" name="city_id" required>
            @foreach ($cities as $city => $id)
            <option @selected($vacancy->city_id == $city) value="{{$city}}">{{$id}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Категория</label>
          <select class="form-control" name="category_id" required>
            @foreach ($vacancyCategories as $c => $id)
            <option @selected($vacancy->category_id == $c) value="{{$c}}">{{$id}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Название вакансии</label>
          <input type="text" class="form-control" placeholder="Название" name="name" value="{{$vacancy->name}}" required>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Зарплата от</label>
              <input type="text" class="form-control" placeholder="Название" name="salary_from" value="{{$vacancy->salary_from}}">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Зарплата до</label>
          <input type="text" class="form-control" placeholder="Ссылка" name="salary_to" value="{{$vacancy->salary_to}}" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Опыт</label>
          <select class="form-control" name="experience" required>
            @foreach (['Без опыта', '1-3 года', '4-6 лет', '7-10 лет'] as $v)
            <option @selected($vacancy->experience == $v) value="{{$v}}">{{$v}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Занятость</label>
          <br>
          Полная 
          <input type="radio" class="form-control" placeholder="Ссылка" name="employment_type" value="Полная" @checked($vacancy->employment_type == 'Полная') required>
          Частичная 
          <input type="radio" class="form-control" placeholder="Ссылка" name="employment_type" value="Частичная" @checked($vacancy->employment_type == 'Частичная') required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Телефон</label>
          <input type="text" class="form-control" placeholder="" name="phone" value="{{$vacancy->phone}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Что нужно делать</label>
              <textarea id="summernote" name="overview" placeholder="Текст описания..." required>{!!$vacancy->overview!!}</textarea>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Мы предлагаем</label>
            <textarea id="summernote1" name="offers" placeholder="Текст описания..." value="{{$vacancy->offers}}"></textarea>
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Требования</label>
          <textarea id="summernote2" name="requirements" placeholder="Текст описания..." value="{{$vacancy->requirements}}"></textarea>
    </div>


        {{--<fieldset>
          <legend>SEO инфа</legend>
          <div class="form-group">
            <label for="exampleInputEmail1">SEO-заголовок, ru</label>
            <input type="text" class="form-control" placeholder="SEO title" name="seo_title_ru" required>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">SEO-заголовок, kz</label>
                <input type="text" class="form-control" placeholder="SEO title" name="seo_title_kz">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">META-описание, ru</label>
            <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_ru" required>
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">META-описание, kz</label>
                <input type="text" class="form-control" placeholder="Meta desc" name="meta_desc_kz" >
            </div>
          
        </fieldset>--}}
      </div>

      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Обновить</button>
      </div>
    </form>
  </div>
@endsection

