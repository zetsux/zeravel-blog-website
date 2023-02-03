@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-5">
    <div class="col-lg-5">
        <main class="form-registration w-100 m-auto">
            <form action="/register" method="post">
                @csrf

                <img class="img-thumbnail shadow rounded-circle mx-auto d-block" src="https://static.vecteezy.com/system/resources/thumbnails/000/602/787/small/83038926.jpg" 
                    alt="Logo Image" width="72" height="57">
                
                <h1 class="d-block mb-5 mt-3 ms-1 text-center">Register</h1>
            
                <div class="form-floating ms-1">
                    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                    <label for="name">Name</label>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating ms-1">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating ms-1">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                    <label for="email">Email Address</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-floating ms-1">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            
                <button class="w-100 btn btn-lg btn-info mt-4 ms-1" type="submit">Register</button>
            </form>
            <small class="d-block mt-3 text-center fs-6 ms-1">Already registered? Login <b><a href="/login" class="text-decoration-none">here</a></b>!</small>
        </main>
    </div>
</div>
@endsection