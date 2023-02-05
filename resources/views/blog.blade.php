{{-- @dd($posts) --}}
@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between">
        <h1 class="ms-3"><b>{{ $title }}</b> Posts</h1>
        <form action="/blog" class="input-group my-2 me-3 w-25">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if (request('user'))
                <input type="hidden" name="user" value="{{ request('user') }}">
            @endif

            <input type="text" class="form-control" placeholder="Enter keywords.." name="search" value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>
    <hr>

    @if ($posts->isEmpty())
        <h3 class="text-center mt-5">
            @switch($type)
                @case("Category")
                    There are no posts available of this category..
                    @break
                @case("User")
                    There are no posts available from this user..
                    @break
                @default
                    There are no posts found..
                    @break
            @endswitch
        </h3>
    @else
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="position-absolute p-3">
                            <a href="/blog?category={{ $posts[0]->category->slug }}" class="text-decoration-none text-light btn btn-dark opacity-75">{{ $posts[0]->category->name }}</a>
                        </div>

                        @if ($posts[0]->image) 
                            <div style="max-height: 300px; overflow: auto">
                                <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="Post Image" class="img-fluid">
                            </div>
                        @else <img src="https://source.unsplash.com/1200x300?{{ $posts[0]->category->name }}" alt="Post Image" class="img-fluid">
                        @endif

                        <div class="card-body text-center">
                        <h3 class="card-title"><a href="/blog/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
                        <small class="text-muted">
                            <h6>
                                By : <a href="/blog?user={{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> ({{ $posts[0]->created_at->diffForHumans() }})
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
                            <a href="/blog?category={{ $p->category->slug }}" class="text-decoration-none text-light btn btn-dark opacity-75">{{ $p->category->name }}</a>
                        </div>

                        @if ($p->image) 
                            <div style="max-height: 250px; overflow: hidden">
                                <img src="{{ asset('storage/' . $p->image) }}" alt="Post Image" class="img-fluid">
                            </div>
                        @else <img src="https://source.unsplash.com/500x300?{{ $p->category->name }}" alt="Post Image" class="img-fluid">
                        @endif

                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="/blog/{{ $p->slug }}" class="text-decoration-none">{{ $p->title }}</a>
                            </h3>
                            <h6>By : <a href="/blog?user={{ $p->user->username }}" class="text-decoration-none">{{ $p->user->name }}</a> ({{ $p->created_at->diffForHumans() }})</h6>
                            <p class="card-text">{{ $p->excerpt }}</p>

                            <a href="/blog/{{ $p->slug }}" class="text-decoration-none btn btn-info mb-3">Read more..</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection