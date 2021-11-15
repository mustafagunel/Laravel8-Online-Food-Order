@extends('Pages.home')

@if (isset($town))
    @section('title', $city.'/'.$town.' - Online Yemek Siparişi, Paket Servis - Yemek Diyarı')
    
    @section('left-filter')
        @include('Home.filter')
    @endsection

    @section('content')
        @include('Home.products')
    @endsection
    

@else
    @section('title', $city.' - Online Yemek Siparişi, Paket Servis - Yemek Diyarı')

    @section('content')
        @include('Home.center')
    @endsection
    
@endif

