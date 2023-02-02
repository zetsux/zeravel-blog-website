{{-- @dd($posts) --}}
@extends('layouts.main')

@section('container')
    <h1><b>{{ $title }}</b> Posts</h1><hr>

    @if ($posts->isEmpty())
        <h3 class="text-center mt-5">
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
        </h3>
    @else
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="position-absolute p-3">
                            <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none text-light btn btn-dark opacity-75">{{ $posts[0]->category->name }}</a>
                        </div>
                        <img src="https://source.unsplash.com/1200x300?{{ $posts[0]->category->name }}" class="card-img-top" alt="Post Image">
                        <div class="card-body text-center">
                        <h3 class="card-title"><a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                        <small class="text-muted">
                            <h6>
                                By : <a href="/author/{{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> ({{ $posts[0]->created_at->diffForHumans() }})
                            </h6>
                        </small>
                        <p class="card-text">{{ $posts[0]->excerpt }}</p>
                        <a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-info mb-3">Read more..</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row mt-2">
            @foreach ($posts->skip(1) as $p)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="position-absolute p-3">
                            <a href="/categories/{{ $p->category->slug }}" class="text-decoration-none text-light btn btn-dark opacity-75">{{ $p->category->name }}</a>
                        </div>
                        <img src="https://source.unsplash.com/500x300?{{ $p->category->name }}" class="card-img-top" alt="Post Image">
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="/blog/{{ $p->slug }}" class="text-decoration-none">{{ $p->title }}</a>
                            </h3>
                            <h6>By : <a href="/author/{{ $p->user->username }}" class="text-decoration-none">{{ $p->user->name }}</a> ({{ $p->created_at->diffForHumans() }})</h6>
                            <p class="card-text">{{ $p->excerpt }}</p>

                            <a href="/blog/{{ $p->slug }}" class="text-decoration-none btn btn-info mb-3">Read more..</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection