@extends('Home.Pages.home')

@if (isset($town))
    @section('title', $city.'/'.$town.' - Online Yemek Siparişi, Paket Servis - Yemek Diyarı')
    
    @section('left-filter')
        @include('Home.filter')
    @endsection

    @section('content')
        @include('Home.products')
    @endsection

@elseif (!isset($town) && isset($city)) 
    @section('title', $city.' - Online Yemek Siparişi, Paket Servis - Yemek Diyarı')

    @section('content')
        @include('Home.center')
    @endsection


@elseif (isset($restaurant)) 
    @section('title', 'Restaurant - '.$restaurant->title)

    @section('content')
        @include('Home.restaurant_detail')
    @endsection
    

@elseif (isset($cart)) 
    @section('title', 'Sepetiniz')

    @if (isset($alert))
        @section('alert')
            @include('Home.Cart.alert')
        @endsection
    @endif
    
    @section('content')
        @include('Home.Cart.cart')
    @endsection
    
@endif

