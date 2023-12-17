@extends('Layouts.admin')

@section('title')
    текст на главной
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
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.main.main_text.edit', $text->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
            <tr>
              <th>текст, ru</th>
              <th>текст, kz</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$text->text_ru}}</td>
                    <td>{{$text->text_kz}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
