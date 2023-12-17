@extends('Layouts.admin')

@section('title')
    Добавить вопрос
@endsection

@section('faq')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.faq.store')}}" method="post">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Вопрос, ru</label>
          <input type="text" class="form-control" placeholder="Вопрос" name="question_ru" required>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Вопрос, kz</label>
              <input type="text" class="form-control" placeholder="Вопрос" name="question_kz">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ответ, ru</label>
            <textarea class="form-control" name="answer_ru" placeholder="Текст ответа..." required></textarea>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Ответ, kz</label>
              <textarea class="form-control" name="answer_kz" placeholder="Текст ответа..."></textarea>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection
