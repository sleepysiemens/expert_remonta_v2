@extends('Layouts.admin')

@section('title')
    Редактировать текст на главной
@endsection

@section('main_text')
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
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>Id</th>
              <th>Текст, ru</th>
              <th>Текст, kz</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($texts as $text)

                <tr>
                    <td>{{$text->id}}</td>
                    <td>{{$text->text_ru}}</td>
                    <td>{{$text->text_kz}}</td>

                    <td><a href="{{route('admin.main.main_text.edit',$text->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.main.main_text.show',$text->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
