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
    </div>
  </div>


@endsection
