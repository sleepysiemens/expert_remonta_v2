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
          <label for="exampleInputEmail1">Имя пользователя</label>
          <input type="text" class="form-control" placeholder="Имя" name="username" required value="{{$review->username}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Оценка</label>
            <input type="number" class="form-control" placeholder="5" name="rating" required value="{{$review->rating}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Текст</label>
            <textarea class="form-control" name="text" placeholder="Текст отзыва..." required>{{$review->text}}</textarea>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection