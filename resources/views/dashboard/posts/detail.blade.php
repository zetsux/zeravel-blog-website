@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid ms-1">
        <div class="row my-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between mb-4">
                    <a href="/dashboard/posts" class="text-decoration-none text-light btn btn-info"><span data-feather="arrow-left-circle"></span> Back to Posts</a>
                    <div>
                        <a href="#" class="text-decoration-none text-light btn btn-warning"><span data-feather="edit-3"></span> Edit</a>
                        <a href="#" class="text-decoration-none text-light btn btn-danger"><span data-feather="trash-2"></span> Delete</a>
                    </div>
                </div>

                <h2 class="mb-2">{{ $post->title }}</h2>

                <img src="https://source.unsplash.com/1200x300?{{ $post->category->name }}" alt="Post Image" class="img-fluid">

                <article class="my-4">
                    @if (str_contains($post->content, '</p>')) {!! $post->content !!}
                    @else {{ $post->content }}<br>
                    @endif
                </article>

                
            </div>
        </div>
    </div>
@endsection