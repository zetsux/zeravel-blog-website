@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-5">
    <div class="col-lg-4">

        @if(session()->has('registered'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('registered') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <main class="form-signin w-100 m-auto">
            <img class="img-thumbnail shadow rounded-circle mx-auto d-block" src="https://static.vecteezy.com/system/resources/thumbnails/000/602/787/small/83038926.jpg" 
                    alt="Logo Image" width="72" height="57">
            <h1 class="d-block mb-5 mt-3 ms-1 text-center">Login</h1>

            <form action="/login" method="post">
                @csrf

                <div class="form-floating ms-1">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" autofocus required value={{ old('username') }}>
                    <label for="username">Username</label>

                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating ms-1">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>

                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            
                <button class="w-100 btn btn-lg btn-primary mt-3 ms-1" type="submit">Login</button>
            </form>
            <small class="d-block mt-3 text-center fs-6 ms-1">Not registered yet? Register <b><a href="/register" class="text-decoration-none">here</a></b>!</small>
        </main>
    </div>
</div>
@endsection