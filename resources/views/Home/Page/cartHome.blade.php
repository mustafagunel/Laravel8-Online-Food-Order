@extends('Home.home')

@section('title', 'Sepet - Online Yemek Siparişi, Paket Servis - Yemek Diyarı')


@section('left')
    <div class="col-sm-3 pb-4">
        @include('Home.Contents.cityHome.cityHomeLeft')
    </div>
@endsection

@section('content')
    <div class="col-sm-7 pb-4">
        @if(isset($success))
            @include('Home.Contents.cartHome.success')
        @else
            @include('Home.Contents.cartHome.cartHome')
        @endif
    </div>
@endsection

