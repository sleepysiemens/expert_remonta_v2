@extends('Layouts.wrapper')

@section('content')

@include('blocks.welcome')
@include('blocks.text_company')
@include('blocks.about_company')
@include('blocks.our_services')
@include('blocks.why')
@include('blocks.faq')
@include('blocks.sales')


@endsection

@section('main')
nav-link-selected
@endsection

@section('sale-form')
    @include('blocks.sale_form')
@endsection

@section('meta-description')
    @foreach ($seos as $seo)
        {{$seo->meta}}
    @endforeach
@endsection

@section('seo-title')
    @foreach ($seos as $seo)
        {{$seo->seo}}
    @endforeach
@endsection

@section('cities')
    <div id="city-yes-no" class="page-wrapper @if(!isset($_COOKIE['city']) OR $_COOKIE['city']==NULL){{'page-wrapper-active'}}@endif">
        <div class="sale-form-div">
            <h3>Выберите город</h3>
            <br>
            <div style="width: 90%; margin: auto; justify-content: space-evenly">
                @foreach($cities as $city)
                    <form style="height: 35px; margin: auto; display: inline-flex; margin: 10px 0; width: 49%; justify-content: center" method="post" action="{{route('city.store')}}">
                        @csrf
                        <input type="hidden" name="city" value="{{$city->city}}">
                        <button class="hidden gradient_button" style="height: 100%" ><p style="margin-top: auto">{{$city->city}}</p></button>
                    </form>
                @endforeach
            </div>
            <br>
        </div>
    </div>
@endsection
