@extends('Admin.Pages.admin')

@section('title', 'Admin Page')

@if($page == 'settings' || $page == 'index.html'  || $page == ''  || $page == 'index'  || $page == 'index.php ' )
    @section('content')
        @include('Admin.Pages.Content.settings');
    @endsection
@endif

@if($page == 'restaurant-list')
    @section('content')
        @include('Admin.Pages.Content.restaurant_list');
    @endsection
@endif

@if($page == 'user-list')
    @section('content')
        @include('Admin.Pages.Content.user_list');
    @endsection
@endif

@if($page == 'restaurant-add')
    @section('content')
        @include('Admin.Pages.Content.restaurant_add');
    @endsection
@endif