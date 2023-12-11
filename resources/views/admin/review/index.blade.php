@extends('Layouts.admin')

@section('title')
    Отзывы
@endsection

@section('reviews')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.review.create')}}" class="btn btn-success">
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
              <th>Имя</th>
              <th>Оценка</th>
              <th>Текст</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($reviews as $review)

                <tr>
                    <td>{{$review->id}}</td>
                    <td>{{$review->username}}</td>
                    <td>{{$review->rating}}/5</td>
                    <td>{{$review->text}}</td>
                    <td>
                      <form method="post" action="{{route('admin.review.destroy',$review->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.review.edit',$review->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.review.show',$review->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>
        
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection