@extends('Layouts.admin')

@section('title')Счетчики @endsection

@section('counter')active @endsection

@section('content')


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.counter.store')}}" method="post">
        @csrf
        <div class="card-body">
          <div class="form-group">
          <div class="form-group">
              <label for="head">Счетчики в конце head</label>
              <br>
              <textarea style="width:100%" rows="10" id="head" name="head_code" placeholder="Добавьте код счетчиков">{{$code->head_code }}</textarea>
          </div>
            <div class="form-group">
                <label for="body">Счетчики в конце body</label>
                <br>
                <textarea style="width:100%" rows="10" id="body" name="body_code" placeholder="Добавьте код счетчиков">{{$code->body_code}}</textarea>
            </div>

        </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </div>
    </form>
  </div>

@endsection


