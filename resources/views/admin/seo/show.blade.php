@extends('Layouts.admin')

@section('title')
    SEO {{$seo->id}}
@endsection

@section('seo')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.seo.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.seo.edit', $seo->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.seo.destroy',$seo->id)}}">
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
              <th>Страница</th>
              <th>SEO-заголовок</th>
              <th>META-описание</th>
            </tr>
        </thead>
        <tbody>


                <tr>
                  <td>{{$seo->id}}</td>
                  <td>{{$seo->page}}</td>
                  <td>{{$seo->seo}}</td>
                  <td>{{$seo->meta}}</td>
                </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection