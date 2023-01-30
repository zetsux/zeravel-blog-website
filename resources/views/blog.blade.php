{{-- @dd($posts) --}}
@extends('layouts.main')

@section('container')
    <h1>Blogs</h1><hr>

    @foreach ($posts as $p)
        <article class="mb-5">
            <h2>
                <a href="/blog/{{ $p["slug"] }}">{{ $p["title"] }}</a>
            </h2>
            <h5>By : {{ $p["author"] }}</h5>
            <p>{{ $p["content"] }}</p>
        </article>
    @endforeach

@endsection

