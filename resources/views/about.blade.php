@extends('layouts.main')

@section('container')
    <h1 class="ms-3">About Zeravel Blog</h1>
    <h3 class="ms-3">{{ $name }}</h3>
    <p class="ms-3">{{ $email }}</p>
    <img class="ms-3 img-fluid" src="img/{{ $image }}" alt="Icon" width="200">
@endsection