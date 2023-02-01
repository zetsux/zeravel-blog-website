@extends('layouts.main')

@section('container')
    <h1><b>{{ $author }}</b>'s Posts</h1><hr>

    @if ($posts->isEmpty()) <h2>There are no posts from this user yet..
    @endif

    @foreach ($posts as $p)
        <article class="mb-4 border-bottom pb-4">
            <h2>
                <a href="/blog/{{ $p->slug }}" class="text-decoration-none">{{ $p->title }}</a>
            </h2>
            <h5>By : <a href="/author/{{ $p->user->username }}" class="text-decoration-none">{{ $p->user->name }}</a> in <a href="/categories/{{ $p->category->slug }}" class="text-decoration-none">{{ $p->category->name }}</a></h5>
            <p>{{ $p->excerpt }}</p>

            <a href="/blog/{{ $p->slug }}" class="text-decoration-none">Read more..</a>
        </article>
    @endforeach

@endsection