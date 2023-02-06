@extends("layouts.main")

@section("container")
    
    <div class="container-fluid ms-1">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <h2 class="mb-2">{{ $post->title }}</h2>
                <h6 class="mb-4">By : <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a> ({{ $post->created_at->diffForHumans() }})</h6>

                @if ($post->image) 
                    <div style="max-height: 300px; overflow: auto">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
                    </div>
                @else <img src="https://source.unsplash.com/1200x300?{{ $post->category->name }}" alt="Post Image" class="img-fluid">
                @endif

                <article class="my-4">
                    {!! $post->content !!}
                </article>

                <a href="/blog" class="text-decoration-none text-light btn btn-primary">⬅️ Back</a>
            </div>
        </div>
    </div>

@endsection