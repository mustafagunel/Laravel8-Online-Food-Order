@extends('Admin.admin')

@section('title', 'Admin Panel')

@section('content')
        @include('Admin.Contents.listUsers')
@endsection
