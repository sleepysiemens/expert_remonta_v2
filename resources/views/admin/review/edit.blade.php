@extends('Layouts.admin')

@section('title')
    Редактировать отзыв
@endsection

@section('reviews')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.review.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.review.update', $review->id)}}" method="post">
        @csrf
        @method('patch')
      <div class="card-body">
          <div class="form-group">
              <label for="exampleInputEmail1">Дата</label>
              <input type="date" class="form-control" placeholder="00.00.0000" name="review_date" value="{{$review->review_date}}">
          </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Имя пользователя, ru</label>
          <input type="text" class="form-control" placeholder="Имя" name="username_ru" required value="{{$review->username_ru}}">
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Имя пользователя, kz</label>
              <input type="text" class="form-control" placeholder="Имя" name="username_kz" value="{{$review->username_kz}}">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Оценка</label>
            <input type="number" class="form-control" placeholder="5" name="rating" required value="{{$review->rating}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст, ru</label>
            <textarea class="form-control" name="text_ru" placeholder="Текст отзыва..." required>{{$review->text_ru}}</textarea>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, kz</label>
              <textarea class="form-control" name="text_kz" placeholder="Текст отзыва...">{{$review->text_kz}}</textarea>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection
