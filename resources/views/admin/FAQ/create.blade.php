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
          <label for="exampleInputEmail1">Вопрос</label>
          <input type="text" class="form-control" placeholder="Вопрос" name="question" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ответ</label>
            <textarea class="form-control" name="answer" placeholder="Текст ответа..." required></textarea>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection