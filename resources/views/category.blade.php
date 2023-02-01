@extends('layouts.main')

@section('container')
    <h1><b>{{ $category }}</b> Posts</h1><hr>

    @if ($posts->isEmpty()) <h2>There are no posts with this category yet..
    @endif

    @foreach ($posts as $p)
        <article class="mb-5">
            <h2>
                <a href="/blog/{{ $p->slug }}">{{ $p->title }}</a>
            </h2>
            <p>{{ $p->excerpt }}</p>
        </article>
    @endforeach

@endsection