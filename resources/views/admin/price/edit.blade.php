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
            <label for="exampleInputEmail1">Название услуги, ru</label>
            <input type="text" class="form-control" placeholder="Название" name="title_ru" required value="{{$price->title_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Название услуги, kz</label>
                <input type="text" class="form-control" placeholder="Название" name="title_kz"  value="{{$price->title_kz}}">
            </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Единица измерения, ru</label>
            <input type="text" class="form-control" placeholder="Ед. Изм." name="unit_ru" required value="{{$price->unit_ru}}">
          </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Единица измерения, kz</label>
                <input type="text" class="form-control" placeholder="Ед. Изм." name="unit_kz" value="{{$price->unit_kz}}">
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
