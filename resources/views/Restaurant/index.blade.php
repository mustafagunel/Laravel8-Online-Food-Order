@extends('Restaurant.Pages.admin')

@section('title', 'Restaurant Page')

@if($page == 'dashboard' || $page == 'index.html'  || $page == ''  || $page == 'index'  || $page == 'index.php ')
    @section('content')
        @include('Restaurant.Pages.Content.dashboard');
    @endsection
@endif

@if($page == 'products')
    @section('content')
        @include('Restaurant.Pages.Content.products_list');
    @endsection
@endif

@if($page == 'add-product')
    @section('content')
        @include('Restaurant.Pages.Content.add_product');
    @endsection
@endif