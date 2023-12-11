@extends('Layouts.admin')

@section('title')
    Контакты {{$contact->name}}
@endsection

@section('contact')
    active
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <a href="{{route('admin.contact.index')}}" class="btn btn-default">
        <i class="fas fa-arrow-left"></i> Назад
    </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col-12" style="display: flex">
      <a href="{{route('admin.contact.edit', $contact->id)}}" class="btn btn-success">
        <i class="fas fa-pen"></i> Редактировать
      </a>
      <form method="post" action="{{route('admin.contact.destroy',$contact->id)}}">
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
              <th>Ссылка</th>
            </tr>
        </thead>
        <tbody>
            <tr>
              <td>{{$contact->id}}</td>
              <td>{{$contact->name}}</td>
              <td>{{$contact->link}}</td>
            </tr>


        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>


@endsection