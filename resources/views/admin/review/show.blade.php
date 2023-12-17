@extends('Layouts.admin')

@section('title')
    Отзыв {{$review->id}}
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

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.review.edit', $review->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.review.destroy',$review->id)}}">
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
              <th>Имя, ru</th>
              <th>Имя, kz</th>
              <th>Оценка</th>
              <th>Текст, ru</th>
              <th>Текст, kz</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$review->id}}</td>
                    <td>{{$review->username_ru}}</td>
                    <td>{{$review->username_kz}}</td>
                    <td>{{$review->rating}}/5</td>
                    <td>{{$review->text_ru}}</td>
                    <td>{{$review->text_kz}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
