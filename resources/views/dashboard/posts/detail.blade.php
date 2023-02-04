@extends('dashboard.layouts.main')

@section('container')
    <div class="container-fluid ms-1">
        <div class="row my-4">
            <div class="col-lg-12">
                <div class="d-flex justify-content-between mb-4">
                    <a href="/dashboard/posts" class="text-decoration-none text-light btn btn-info"><span data-feather="arrow-left-circle" style="margin-bottom:3px"></span> Back to Posts</a>
                    <div>
                        <a href="#" class="text-decoration-none text-light btn btn-warning"><span data-feather="edit-3" style="margin-bottom:3px"></span> Edit</a>
                        <a href="#" class="text-decoration-none text-light btn btn-danger"><span data-feather="trash-2" style="margin-bottom:3px"></span> Delete</a>
                    </div>
                </div>

                <h2 class="mb-2">{{ $post->title }}</h2>

                <img src="https://source.unsplash.com/1200x300?{{ $post->category->name }}" alt="Post Image" class="img-fluid">

                <article class="my-4">
                    {!! $post->content !!}
                </article>

                
            </div>
        </div>
    </div>
@endsection