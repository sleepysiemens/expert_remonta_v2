@extends('Layouts.admin')

@section('title')
    Вопросы
@endsection

@section('faq')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.faq.create')}}" class="btn btn-success">
        <i class="fas fa-plus"></i> Добавить
      </a>
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
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($questions as $question)

                <tr>
                    <td>{{$question->id}}</td>
                    <td>{{$question->question_ru}}</td>
                    <td>{{$question->question_kz}}</td>
                    <td>{{$question->answer_ru}}</td>
                    <td>{{$question->answer_kz}}</td>
                    <td>
                      <form method="post" action="{{route('admin.faq.destroy',$question->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.faq.edit',$question->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.faq.show',$question->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
