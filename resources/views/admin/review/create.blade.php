@extends('Layouts.admin')

@section('title')
    Добавить отзыв
@endsection

@section('reviews')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.review.store')}}" method="post">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Имя пользователя, ru</label>
          <input type="text" class="form-control" placeholder="Имя" name="username_ru" required>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Имя пользователя, kz</label>
              <input type="text" class="form-control" placeholder="Имя" name="username_kz">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Оценка</label>
            <input type="number" class="form-control" placeholder="5" name="rating" value="5" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст, ru</label>
            <textarea class="form-control" name="text_ru" placeholder="Текст отзыва..." required></textarea>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Текст, kz</label>
              <textarea class="form-control" name="text_kz" placeholder="Текст отзыва..."></textarea>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection
