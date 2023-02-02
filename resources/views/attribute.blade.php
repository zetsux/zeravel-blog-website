@extends('layouts.main')

@section('container')
    <h1>{{ $title }}</h1><hr>

    @if ($attributes->isEmpty()) <h2>There are no registered {{ $type }} yet..
    @endif

    @switch ($type)
        @case('users')
            @foreach ($attributes as $a)
                <ul>
                    <li>
                        <h2><a href="/{{ $type }}/{{ $a->username }}" class="text-decoration-none">{{ $a->name }}</a></h2>
                    </li>
                </ul>
            @endforeach
            @break

        @case('categories')
            @foreach ($attributes as $a)
                <ul>
                    <li>
                        <h2><a href="/{{ $type }}/{{ $a->slug }}" class="text-decoration-none">{{ $a->name }}</a></h2>
                    </li>
                </ul>
            @endforeach
            @break

        @default
            @break
    @endswitch

@endsection