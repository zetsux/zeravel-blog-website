@extends('layouts.main')

@section('container')
    <h1>About Zeravel Blog</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="Icon" width="200">
@endsection