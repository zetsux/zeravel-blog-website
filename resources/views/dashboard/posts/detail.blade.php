@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid ms-1">
        <div class="row my-4">
            <div class="col-lg-11">
                <div class="d-flex justify-content-between mb-4">
                    <a href="/dashboard/posts" class="text-decoration-none text-light btn btn-secondary"><span data-feather="arrow-left-circle" style="margin-bottom:3px"></span> Back to Posts</a>
                    <div>
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="text-decoration-none text-light btn btn-warning"><span data-feather="edit-3" style="margin-bottom:3px"></span> Edit</a>

                        <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
  
                            <button class="text-light btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><span data-feather="trash-2"></span> Delete</button>
                        </form>
                    </div>
                </div>

                <h2 class="mb-2">{{ $post->title }}</h2>

                @if ($post->image) 
                    <div style="max-height: 300px; overflow: auto">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
                    </div>
                @else <img src="https://source.unsplash.com/1200x300?{{ $post->category->name }}" alt="Post Image" class="img-fluid">
                @endif
                
                <article class="my-4">
                    {!! $post->content !!}
                </article>

                
            </div>
        </div>
    </div>
@endsection