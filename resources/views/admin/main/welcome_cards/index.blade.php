@extends('Layouts.admin')

@section('title')
    Карточки
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
      <a href="{{route('admin.main.welcome_cards.create')}}" class="btn btn-success">
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
              <th>Заголовок</th>
              <th>Изображение</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($WelcomeCards as $card)

                <tr>
                    <td>{{$card->id}}</td>
                    <td>{{$card->title}}</td>
                    <td>{{$card->src}}</td>
                    <td>
                      <form method="post" action="{{route('admin.main.welcome_cards.destroy',$card->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.main.welcome_cards.edit',$card->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.main.welcome_cards.show',$card->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>
        
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection