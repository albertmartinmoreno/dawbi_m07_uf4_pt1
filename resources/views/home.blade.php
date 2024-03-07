@extends('layout')

@section('title', 'Home')

@section('content')
    <img src="{{ asset('images/laliga.jpg') }}" alt="La Liga" class="img-fluid" width="500"> 
    <div class="fw-bolder fs-5 mb-5">Welcome to LaLiga!</div> 
    <div class="mb-3">Laravel app of LaLiga</div>
    <div class="mb-3">Add, edit, and delete teams and players</div>
@endsection