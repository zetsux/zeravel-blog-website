@extends("layouts.main")

@section("container")
    <h2>{{ $post->title }}</h2>
    <h5>By : <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></h5>

    @if (str_contains($post->content, '</p>')) {!! $post->content !!}
    @else {{ $post->content }}<br>
    @endif

    <br>
    <a href="/blog">Go back</a>
@endsection