@extends('Layouts.admin')

@section('title')
    Редактировать стоимость услуги
@endsection

@section('price')
    active
@endsection

@section('content')

<div class="row">
  <div class="col-12">
    <a href="{{route('admin.price.index')}}" class="btn btn-default">
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
    <form action="{{route('admin.price.update', $price->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Название услуги</label>
            <input type="text" class="form-control" placeholder="Название" name="title" required value="{{$price->title}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Единица измерения</label>
            <input type="text" class="form-control" placeholder="Ед. Изм." name="unit" required value="{{$price->unit}}">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Стоимость</label>
              <input type="number" class="form-control" name="price" placeholder="Цена" required value="{{$price->price}}">
          </div>
  
          <div class="form-group">
            <label for="exampleInputEmail1">Категория</label>
            <select class="form-control" name="category" required>
                @foreach ($price_categories as $price_category)
                    <option @if ($price_category->category==$price->category) selected @endif value="{{$price_category->category}}">{{$price_category->category}}</option>
                @endforeach
            </select>
          </div>
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Изменить</button>
      </div>
    </form>
  </div>
@endsection