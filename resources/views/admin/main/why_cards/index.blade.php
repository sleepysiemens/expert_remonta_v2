@extends('Layouts.admin')

@section('title')
    Карточки
@endsection

@section('why')
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
      <a href="{{route('admin.main.why_cards.create')}}" class="btn btn-success">
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
              <th>Заголовок, ru</th>
              <th>Позаголовок, ru</th>
              <th>Заголовок, kz</th>
              <th>Позаголовок, kz</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($WhyCards as $card)

                <tr>
                    <td>{{$card->id}}</td>
                    <td>{{$card->title_ru}}</td>
                    <td>{{$card->subtitle_ru}}</td>
                    <td>{{$card->title_kz}}</td>
                    <td>{{$card->subtitle_kz}}</td>
                    <td>
                      <form method="post" action="{{route('admin.main.why_cards.destroy',$card->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.main.why_cards.edit',$card->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.main.why_cards.show',$card->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
