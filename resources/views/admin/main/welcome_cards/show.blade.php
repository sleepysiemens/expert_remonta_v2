@extends('Layouts.admin')

@section('title')
    Карточка {{$WelcomeCards->id}}
@endsection

@section('cards')
    active
@endsection

@section('dropdown')
display:block;
@endsection

@section('menu-dropdown')
menu-open
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.main.welcome_cards.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.main.welcome_cards.edit', $WelcomeCards->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.main.welcome_cards.destroy',$WelcomeCards->id)}}">
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
              <th>Название</th>
              <th>Изображение</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                  <td>{{$WelcomeCards->id}}</td>
                  <td>{{$WelcomeCards->title}}</td>
                  <td>{{$WelcomeCards->src}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection