@extends('layouts.main')

@section('container')
    <h1 class="ms-3">{{ $title }}</h1><hr>

    @if ($attributes->isEmpty()) <h2>There are no registered {{ $type }} yet..</h2>
    @endif
        
    <div class="container-fluid">
        <div class="row">
            @switch ($type)
                @case('user')
                    @foreach ($attributes as $a)
                        <div class="col-md-4 mt-2 mb-4">
                            <div class="card text-bg-dark">
                                <img src="https://user-images.githubusercontent.com/11250/39013954-f5091c3a-43e6-11e8-9cac-37cf8e8c8e4e.jpg" class="card-img" alt="User Image">
                                <div class="card-img-overlay d-flex align-items-center">
                                    <a href="/blog?{{ $type }}={{ $a->username }}">
                                        <div class="card-img-overlay d-flex align-items-center p-0">
                                            <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $a->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @break

                @case('category')
                    @foreach ($attributes as $a)
                        <div class="col-md-4 mt-2 mb-4">
                            <div class="card text-bg-dark">
                                <img src="https://source.unsplash.com/500x300?{{ $a->name }}" class="card-img" alt="Category Image">
                                <a href="/blog?{{ $type }}={{ $a->slug }}">
                                    <div class="card-img-overlay d-flex align-items-center p-0">
                                        <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $a->name }}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @break

                @default
                    @break
            @endswitch
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $attributes->links() }}
    </div>

@endsection