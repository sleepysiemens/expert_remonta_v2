@extends('Layouts.admin')

@section('title')
    Добавить стоимость услуги
@endsection

@section('price')
    active
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><br></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('admin.price.store')}}" method="post">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Название услуги</label>
          <input type="text" class="form-control" placeholder="Название" name="title" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Единица измерения</label>
          <input type="text" class="form-control" placeholder="Ед. Изм." name="unit" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Стоимость</label>
            <input type="number" class="form-control" name="price" placeholder="Цена" required>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Категория</label>
          <select class="form-control" name="category" required>
              @foreach ($price_categories as $price_category)
                  <option value="{{$price_category->category}}">{{$price_category->category}}</option>
              @endforeach
          </select>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </form>
  </div>
@endsection