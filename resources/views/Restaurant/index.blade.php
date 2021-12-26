@extends('Restaurant.Pages.admin')

@section('title', 'Restaurant Page')

@if(isset($success))
    @section('content')
        @include('Restaurant.success');
    @endsection

@elseif($page == 'dashboard' || $page == 'index.html'  || $page == ''  || $page == 'index'  || $page == 'index.php ')
    @section('content')
        @include('Restaurant.Pages.Content.dashboard')
    @endsection

@elseif($page == 'products')
    @section('content')
        @include('Restaurant.Pages.Content.products_list')
    @endsection

@elseif($page == 'add-product')
    @section('content')
        @include('Restaurant.Pages.Content.add_product')
    @endsection

@elseif($page == 'edit-product')
    @section('content')
        @include('Restaurant.Pages.Content.edit_product')
    @endsection

@elseif($page == 'list-orders')
    @section('content')
        @include('Restaurant.Pages.Content.list_orders')
    @endsection


@endif

