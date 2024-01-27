@extends('Layouts.admin')

@section('title') Добавить вакансию @endsection

@section('vacancies')active @endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.vacancy.store')}}" method="post" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Город</label>
          <select class="form-control" name="city_id" required>
            @foreach ($cities as $city => $id)
            <option value="{{$city}}">{{$id}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Категория</label>
          <select class="form-control" name="category_id" required>
            @foreach ($vacancyCategories as $c => $id)
            <option value="{{$c}}">{{$id}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Название вакансии</label>
          <input type="text" class="form-control" placeholder="Название" name="name" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">URL (укажите сами или сгенерируется автоматически из названия)</label>
          <input type="text" class="form-control" placeholder="название" name="url">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Название КЗ</label>
          <input type="text" class="form-control" placeholder="название" name="name_kz">
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Зарплата от</label>
              <input type="text" class="form-control" placeholder="" name="salary_from">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Зарплата до</label>
          <input type="text" class="form-control" placeholder="" name="salary_to">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Опыт</label>
          <select class="form-control" name="experience" required>
            @foreach (['Без опыта', '1-3 года', '4-6 лет', '7-10 лет'] as $v)
            <option value="{{$v}}">{{$v}}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Занятость</label>
          <br>
          Полная <input type="radio" class="form-control" placeholder="Ссылка" name="employment_type" value="Полная" required>
          Частичная <input type="radio" class="form-control" placeholder="Ссылка" name="employment_type" value="Частичная" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Телефон</label>
          <input type="text" class="form-control" placeholder="" name="phone">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">SEO Title ru</label>
          <input type="text" class="form-control" placeholder="название" name="seo_title_ru">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">SEO Title kz</label>
          <input type="text" class="form-control" placeholder="название" name="seo_title_kz">
        </div>
        <div class="form-group">
          <label for="mtru">Meta desc ru</label>
          <input type="text" class="form-control" placeholder="название" name="meta_desc_ru">
        </div>
        <div class="form-group">
          <label for="mtkz">Meta desc kz</label>
          <input type="text" class="form-control" placeholder="название" name="meta_desc_kz">
      </div>

        <div class="form-group">
            <label for="summernote">Что нужно делать</label>
              <textarea id="summernote" name="overview" placeholder="Текст описания..."></textarea>
        </div>

        <div class="form-group">
          <label for="summernote4">Что нужно делать КЗ</label>
            <textarea id="summernote4" name="overview_kz" placeholder="Текст описания..."></textarea>
      </div>

        <div class="form-group">
          <label for="summernote1">Мы предлагаем</label>
            <textarea id="summernote1" name="offers" placeholder="Текст описания..."></textarea>
      </div>

      <div class="form-group">
        <label for="summernote5">Мы предлагаем КЗ</label>
          <textarea id="summernote5" name="offers_kz" placeholder="Текст описания..."></textarea>
    </div>

      <div class="form-group">
        <label for="summernote2">Требования</label>
          <textarea id="summernote2" name="requirements" placeholder="Текст описания..."></textarea>
    </div>

    <div class="form-group">
      <label for="summernote6">Требования КЗ</label>
        <textarea id="summernote6" name="requirements_kz" placeholder="Текст описания..."></textarea>
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
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
    {{--<button type="submit" class="btn btn-primary">Добавить</button>--}}
  </div>
@endsection

