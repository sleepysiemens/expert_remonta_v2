@extends('Layouts.admin')

@section('title')
    Редактировать вопрос
@endsection

@section('faq')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.faq.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.faq.update', $question->id)}}" method="post">
        @csrf
        @method('patch')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Вопрос, ru</label>
          <input type="text" class="form-control" placeholder="Вопрос" name="question_ru" required value="{{$question->question_ru}}">
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Вопрос, kz</label>
              <input type="text" class="form-control" placeholder="Вопрос" name="question_kz" value="{{$question->question_kz}}">
          </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ответ, ru</label>
            <textarea class="form-control" name="answer_ru" placeholder="Текст ответа..." required>{{$question->answer_ru}}</textarea>
        </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Ответ, kz</label>
              <textarea class="form-control" name="answer_kz" placeholder="Текст ответа...">{{$question->answer_kz}}</textarea>
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection
