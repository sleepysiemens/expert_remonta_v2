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
          <label for="exampleInputEmail1">Вопрос</label>
          <input type="text" class="form-control" placeholder="Вопрос" name="question" required value="{{$question->question}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ответ</label>
            <textarea class="form-control" name="answer" placeholder="Текст ответа..." required>{{$question->answer}}</textarea>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection