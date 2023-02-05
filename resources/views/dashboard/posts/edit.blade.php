@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Edit</h1>
    </div>

    <div class="col-lg-9">
        <form action="/dashboard/posts/{{ $post->slug }}" method="post" enctype="multipart/form-data" class="mb-5">
            @method('put')
            @csrf

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $post->title) }}" autofocus required>

              @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" readonly required>

                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id" id="category" required>
                    @foreach($categories as $c)
                        <option value="{{ $c->id }}" {{ old('category_id', $post->id) == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>

                <input type="hidden" name="oldImg" value="{{ $post->image }}">
                
                @if ($post->image) <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 mt-1 d-block" style="max-height: 300px; overflow: auto">
                @else <img class="img-preview img-fluid mb-3 mt-1" style="max-height: 300px; overflow: auto">
                @endif

                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImg()">

                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input id="content" type="hidden" name="content" value="{{ old('content',  $post->content) }}">
                <trix-editor input="content"></trix-editor>

                @error('content')
                    <div class="text-danger">
                        <small>{{ $message }}</small>
                    </div>
                @enderror
            </div>


            <button type="submit" class="btn btn-success mt-3">Edit Post</button>
        </form>
    </div>

    @include('dashboard.layouts.postScript')
@endsection