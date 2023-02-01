@extends('layouts.main')

@section('container')
    <h1>Categories</h1><hr>

    @if ($categories->isEmpty()) <h2>There are no categories yet..
    @endif

    @foreach ($categories as $c)
        <ul>
            <li>
                <h2><a href="/categories/{{ $c->slug }}" class="text-decoration-none">{{ $c->name }}</a></h2>
            </li>
        </ul>
    @endforeach

@endsection