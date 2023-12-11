@extends('Layouts.admin')

@section('title')
    SEO
@endsection

@section('seo')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.seo.create')}}" class="btn btn-success">
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
              <th>Страница</th>
              <th>SEO-заголовок</th>
              <th>META-описание</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($seos as $seo)

                <tr>
                    <td>{{$seo->id}}</td>
                    <td>{{$seo->page}}</td>
                    <td>{{$seo->seo}}</td>
                    <td>{{$seo->meta}}</td>
                    <td>
                      <form method="post" action="{{route('admin.seo.destroy',$seo->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                    <td><a href="{{route('admin.seo.edit',$seo->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td><a href="{{route('admin.seo.show',$seo->id)}}"><i class="fas fa-arrow-right"></i></a></td>
                </tr>
        
            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection