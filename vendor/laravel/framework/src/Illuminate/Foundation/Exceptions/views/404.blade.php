@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))
<a href="{{asset(route('main.index'))}}">На главную</a>
