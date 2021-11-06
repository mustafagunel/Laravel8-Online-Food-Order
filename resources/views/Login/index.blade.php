
{{ $name }}
<hr>

@php
$users = ["Ali","Ayşe","Fatma"];
@endphp

@foreach ($users as $user)
    <p>This is user {{ $user }}</p>
@endforeach

<!-- resources/views/layouts/app.blade.php -->
<hr><hr><hr><hr>
<!-- resources/views/child.blade.php -->

{{--  comment lines
@extends('Layouts.test')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection
--}}

@extends('Login.login_form');
