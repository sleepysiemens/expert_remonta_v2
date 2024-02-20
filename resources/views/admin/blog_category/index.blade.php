@extends('Layouts.admin')

@section('title')
    Категории блога
@endsection

@section('blog_category')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.blogCategory.create')}}" class="btn btn-success">
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
              {{--<th>Id</th>--}}
              <th>Название ru/kz</th>
              <th>URL</th>
              <th>Родительский пункт</th>
              <th></th>
              <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($items as $i)

                <tr>
                    <td>{{$i->name}} @if($i->name_kz)/{{$i->name_kz}}@endif</td>
                    <td>{{$i->url}}</td>
                    <td>
                      @if($i->parent_id) {{$i->parent->name}} @endif
                    </td>
                    <td><a href="{{route('admin.blogCategory.edit',$i->id)}}"><i class="fas fa-pen"></i></a></td>
                    <td>
                      <form method="post" action="{{route('admin.blogCategory.destroy',$i->id)}}">
                        @csrf
                        @method('delete')
                        <button style="border: none; background-color: transparent; color: rgb(196, 3, 3)" onclick="(function() {
                          if(!confirm('Действительно удалить?')) event.preventDefault();
                        })();"><i class="far fa-trash-alt"></i></button>
                      </form>
                    </td>
                </tr>

            @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>

@endsection
