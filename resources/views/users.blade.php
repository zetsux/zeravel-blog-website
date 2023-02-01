@extends('layouts.main')

@section('container')
    <h1>Users</h1><hr>

    @if ($users->isEmpty()) <h2>There are no registered users yet..
    @endif

    @foreach ($users as $u)
        <ul>
            <li>
                <h2><a href="/author/{{ $u->username }}" class="text-decoration-none">{{ $u->name }}</a></h2>
            </li>
        </ul>
    @endforeach

@endsection