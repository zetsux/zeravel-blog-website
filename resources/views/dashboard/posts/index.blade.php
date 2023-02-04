@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ auth()->user()->name }}'s Posts</h1>
    </div>

    <div class="table-responsive col-lg-10">
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
                        <a href="/dashboard/posts/{{ $p->id }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                        <a href="#" class="badge bg-warning"><span data-feather="edit-3"></span></a>
                        <a href="#" class="badge bg-danger"><span data-feather="trash-2"></span></a>
                    </td>
                <tr>
            @endforeach

          </tbody>
        </table>
    </div>
@endsection