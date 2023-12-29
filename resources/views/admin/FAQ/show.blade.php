@extends('Layouts.admin')

@section('title')
    Вопрос {{$question->id}}
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

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.faq.edit', $question->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.faq.destroy',$question->id)}}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-primary float-right" style="margin-left: 10px; background-color: rgb(196, 3, 3); border: rgb(196, 3, 3)">
            <i class="far fa-trash-alt"></i></i> Удалить
        </button>
      </form>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Вопрос, ru</th>
              <th>Вопрос, kz</th>
              <th>Ответ, ru</th>
              <th>Ответ, kz</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$question->id}}</td>
                    <td>{{$question->question_ru}}</td>
                    <td>{{$question->question_kz}}</td>
                    <td>{{$question->answer_ru}}</td>
                    <td>{{$question->answer_kz}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
