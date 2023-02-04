@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Posts Created by You</h1>
    </div>

    @if(session()->has('posted'))
      <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
          {{ session('posted') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <a href="/dashboard/posts/create" class="btn btn-success mb-3"><span data-feather="plus-circle" style="margin-bottom:3px"></span> New Post</a>

    @if ($posts->isEmpty()) <h3 class="text-center my-5">You don't have any post... Why don't you try posting something?</h3>
    @else
      <div class="table-responsive col-lg-12">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($posts as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->title }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td>
                        <a href="/dashboard/posts/{{ $p->slug }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                        <a href="#" class="badge bg-warning"><span data-feather="edit-3"></span></a>
                        <a href="#" class="badge bg-danger"><span data-feather="trash-2"></span></a>
                    </td>
                <tr>
            @endforeach

          </tbody>
        </table>
      </div>
    @endif

@endsection