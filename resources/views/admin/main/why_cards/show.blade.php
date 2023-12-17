@extends('Layouts.admin')

@section('title')
    Карточка {{$WhyCards->id}}
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
      <a href="{{route('admin.main.why_cards.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.main.why_cards.edit', $WhyCards->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.main.why_cards.destroy',$WhyCards->id)}}">
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
                <th>Заголовок, ru</th>
                <th>Позаголовок, ru</th>
                <th>Заголовок, kz</th>
                <th>Позаголовок, kz</th>
                <th>Изображение</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$WhyCards->id}}</td>
                    <td>{{$WhyCards->title_ru}}</td>
                    <td>{{$WhyCards->subtitle_ru}}</td>
                    <td>{{$WhyCards->title_kz}}</td>
                    <td>{{$WhyCards->subtitle_kz}}</td>
                    <td>{{$WhyCards->src}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
