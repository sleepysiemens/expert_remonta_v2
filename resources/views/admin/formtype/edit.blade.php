@extends('Layouts.admin')

@section('title')
    Редактировать
@endsection

@section('formtype')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.formtype.index')}}" class="btn btn-default">
      <i class="fas fa-arrow-left"></i> Назад
  </a>
  </div>
</div>
<br>


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.formtype.update', $type->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="name">Название</label>
            <input id="name" type="text" class="form-control" placeholder="Название" name="name" required value="{{$type->name}}">
          </div>

          <div class="form-group">
            <label for="emails">Список email для оповещения, каждый с новой строки</label>
            <br>
            @if(env('APP_CITY') === 'Астана')
            <textarea style="width:100%" rows="7" id="emails" name="emails" placeholder="Список email для оповещения, каждый с новой строки">{{$type->emails}}</textarea>
            @else
            <textarea style="width:100%" rows="7" id="emails" name="emails_almaty" placeholder="Список email для оповещения, каждый с новой строки">{{$type->emails_almaty}}</textarea>
            @endif
          </div>
  
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
  </div>
@endsection