@extends('Home.Pages.home')

@section('title', 'Profil Sayfam')

@if (isset($success))
    @section('content')
        @include('User.Pages.success')
    @endsection


@else
    @section('content')
        @include('User.Pages.profile')
    @endsection 
    
    
    
    
    
    
    
    
    
    
    
@endif