@extends('Restaurant.restaurant')

@section('title', 'Restaurant Panel')


@section('content')
    @if(isset($success))
        @include('Restaurant.Contents.addProduct.success')
    @elseif(isset($error))
        @include('Restaurant.Contents.addProduct.error')
    @else
        @include('Restaurant.Contents.addProduct.addProduct')
    @endif
@endsection

