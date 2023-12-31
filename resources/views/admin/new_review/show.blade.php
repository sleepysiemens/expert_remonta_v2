@extends('Layouts.admin')

@section('title')
    Отзыв {{$new_review->id}}
@endsection

@section('new_reviews')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.new_reviews.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <form method="post" action="{{route('admin.new_reviews.destroy',$new_review->id)}}">
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
                <th>Дата создания</th>
                <th>Имя пользователя</th>
                <th>Оценка</th>
                <th>Текст</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$new_review->id}}</td>
                    <td>{{$new_review->created_at}}</td>
                    <td>{{$new_review->username}}</td>
                    <td>{{$new_review->rating}}/5</td>
                    <td>{{$new_review->text}}</td>

                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
