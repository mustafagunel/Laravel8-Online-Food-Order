@extends('Restaurant.restaurant')

@section('title', 'Restaurant Panel')


@section('content')
    @include('Restaurant.Contents.listOrders.listOrders')
@endsection

