@extends('Admin.Pages.admin')

@section('title', 'Admin Page')

@if($page == 'dashboard' || $page == 'index.html'  || $page == ''  || $page == 'index'  || $page == 'index.php ')
    @section('content')
        @include('Admin.Pages.Content.dashboard');
    @endsection
@endif