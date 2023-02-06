@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show mb-4 col-lg-7" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <a href="/dashboard/categories/create" class="btn btn-success mb-3"><span data-feather="plus-square" style="margin-bottom:3px"></span> New Category</a>

    @if ($categories->isEmpty()) <h3 class="text-center my-5">There are no categories at all... Why don't you add one?</h3>
    @else
      <div class="table-responsive col-lg-7">
        <table class="table table-striped table-bordered border-light table-sm align-middle">
          <thead class="table-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category Name</th>
              <th scope="col" style="width: 16.7%">Action</th>
            </tr>
          </thead>
          <tbody class="table-group-divider table-light">
            @foreach ($categories as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->name }}</td>
                    <td>
                        <a href="/dashboard/categories/{{ $c->slug }}/edit" class="badge bg-warning"><span data-feather="edit-3"></span></a>

                        <form action="/dashboard/categories/{{ $c->slug }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf

                          <button class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete this?')"><span data-feather="trash-2"></span></button>
                        </form>
                    </td>
                <tr>
            @endforeach

          </tbody>
        </table>
      </div>
    @endif

@endsection