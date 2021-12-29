@extends('Home.home')

@section('title', 'Şehir Seç - Online Yemek Siparişi, Paket Servis - Yemek Diyarı')

@section('header')
    <header>
        <div class="container p-3">
            <div class="row align-items-center justify-content-md-center">
                <div class="col-sm-3">
                    <a class="navbar-brand " style="font-size:2.25rem; font-family: 'Pacifico', cursive; color:white"  href="#">
                        Yemek Diyarı
                    </a>
                </div>            
            </div>
        </div>
    </header>
@endsection

@section('left')
@endsection

@section('content')
    @include('Home.Contents.countries')
@endsection


@section('right')
@endsection