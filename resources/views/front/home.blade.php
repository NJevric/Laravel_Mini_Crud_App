@extends('layouts.front')

@section('title')
    Home
@endsection
@section('header')
    Welcome to home page
@endsection
@section('content')
    
    @if(session()->has('user'))
    <h1>Welcome {{session('user')->FirstName}} {{session('user')->LastName}}</h1>
        @else
        <h1>Welcome</h1>
    @endif
@endsection