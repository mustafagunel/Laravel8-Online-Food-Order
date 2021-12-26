@extends('Admin.Pages.admin')

@section('title', 'Admin Page')


@if(isset($success))
    @section('content')
        @include('Admin.Pages.success');
    @endsection

@elseif($page == 'settings' || $page == 'index.html'  || $page == ''  || $page == 'index'  || $page == 'index.php ' )
    @section('content')
        @include('Admin.Pages.Content.settings');
    @endsection

@elseif($page == 'restaurant-list')
    @section('content')
        @include('Admin.Pages.Content.restaurant_list');
    @endsection

@elseif($page == 'user-list')
    @section('content')
        @include('Admin.Pages.Content.user_list');
    @endsection

    
@elseif($page == 'restaurant-add')
    @section('content')
        @include('Admin.Pages.Content.restaurant_add');
    @endsection

@elseif($page == 'update-restaurant')
    @section('content')
        @include('Admin.Pages.Content.update_restaurant');
    @endsection

@endif