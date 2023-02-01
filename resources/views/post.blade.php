@extends("layouts.main")

@section("container")
    <h2>{{ $post->title }}</h2>
    <h5>By : {{ $post->author }}</h5>

    @if (str_contains($post->content, '</p>')) {!! $post->content !!}
    @else {{ $post->content }}<br>
    @endif

    <br>
    <a href="/blog">Go back</a>
@endsection