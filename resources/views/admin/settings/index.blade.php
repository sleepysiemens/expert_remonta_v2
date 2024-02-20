@extends('Layouts.admin')

@section('title')
    Настройки
@endsection

@section('settings')
    active
@endsection

@section('content')


<div class="row">
    <div class="col-12">
      <h2>Кэш</h2>
      <p>Все страницы сайта автоматически кэшируются, кэш очищается раз в сутки. Если вы внесли какие-то изменения в админке и хотите чтобы пользователи увидели их
        сейчас же, нажмите кнопку очистить кэш.
      </p>
      <a class="btn btn-warning" href="{{route('admin.settings.cache.reset')}}">Очистить кэш</a>
      @if(auth()->id() === 1)
        <h2>Внутренний кэш Laravel</h2>
        <p style="color:red">Здесь можно очистить и по новой создать внутренний кэш Laravel. 
          Кнопки только для разработчика!</p>
          <a class="btn btn-danger" href="{{route('admin.settings.cacheAll')}}">
            Закэшировать внутрянку Laravel</a>
          <a class="btn btn-danger" href="{{route('admin.settings.uncacheAll')}}">
            Раскэшировать внутрянку Laravel</a>
      @endif
    </div>
  </div>


@endsection
