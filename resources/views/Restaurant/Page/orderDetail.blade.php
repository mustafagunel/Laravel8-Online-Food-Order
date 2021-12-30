@extends('Restaurant.restaurant')

@section('title', 'Restaurant Panel')

@section('sidebar')
@endsection

@section('topbar')
@endsection


@section('content')
    @include('Restaurant.Contents.orderDetail.orderDetail')
@endsection

