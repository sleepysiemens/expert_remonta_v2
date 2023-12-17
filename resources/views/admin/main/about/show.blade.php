@extends('Layouts.admin')

@section('title')
    Редактировать "О нас"
@endsection

@section('about')
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
      <a href="{{route('admin.main.about.edit', $about->id)}}" class="btn btn-success">
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
              <th>изображение</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                    <td>{{$about->title_ru}}</td>
                    <td>{{$about->title_kz}}</td>
                    <td>{{$about->src}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection
