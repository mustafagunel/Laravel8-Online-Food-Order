@extends('Home.home')

@section('title', $city.' - Online Yemek Siparişi, Paket Servis - Yemek Diyarı')


@section('left')
    <div class="col-sm-3 pb-4">
        @include('Home.Contents.cityHome.cityHomeLeft')
    </div>

@endsection

@section('content')
    <div class="col-sm-7 pb-4">
        @include('Home.Contents.cityHome.cityHome')
    </div>
@endsection


@section('right')
    <div class="col-sm-1 pb-4"> 
        @include('Home.Contents.cityHome.cityHomeRight')
    </div>
@endsection

