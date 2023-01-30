@extends("layouts.main")

@section("container")
    <h2>{{ $post["title"] }}</h2>
    <h5>By : {{ $post["author"] }}</h5>
    <p>{{ $post["content"] }}</p>

    <a href="/blog">Go back</a>
@endsection