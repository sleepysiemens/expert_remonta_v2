@extends('Layouts.admin')

@section('title')
    Отзывы
@endsection

@section('new_reviews')
    active
@endsection

@section('content')

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

@foreach ($new_reviews as $new_review)

              <tr>
                <td>{{$new_review->id}}</td>
                <td>{{$new_review->created_at}}</td>
                <td>{{$new_review->username}}</td>
                <td>{{$new_review->rating}}/5</td>
                <td>{{$new_review->text}}</td>
                  {{--<td>
                    <form method="post" action="{{route('admin.new_reviews.destroy',$new_review->id)}}">
                      @csrf
                      @method('delete')
                      <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                    </form>
                  </td>--}}
              </tr>

@endforeach

      </tbody>
    </table>
  </div>
  <!-- /.col -->
</div>



@endsection
