@extends('Home.home')

@section('title', 'Sık Sorulan Sorular - Online Yemek Siparişi, Paket Servis - Yemek Diyarı')


@section('left')
    <div class="col-sm-3 pb-4">
        @include('Home.Contents.cityHome.cityHomeLeft')
    </div>

@endsection

@if(isset($success))
    @section('content')
        <div class="col-sm-7 pb-4">
            @include('Home.Contents.iletisim.success')
        </div>
    @endsection
@else
    @section('content')
        <div class="col-sm-7 pb-4">
            @include('Home.Contents.iletisim.iletisim')
        </div>
    @endsection
@endif
