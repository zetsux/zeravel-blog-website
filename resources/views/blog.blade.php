{{-- @dd($posts) --}}
@extends('layouts.main')

@section('container')
    <h1><b>{{ $title }}</b> Posts</h1><hr>

    @if ($posts->isEmpty())
        <h2>
            @switch($type)
                @case("Category")
                    There are no post yet of this category..
                    @break
                @case("User")
                    There are no post yet from this user..
                    @break
                @default
                    There are no post yet..
                    @break
            @endswitch
        </h2>
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