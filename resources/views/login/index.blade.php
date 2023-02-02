@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-5">
    <div class="col-lg-4">
        <main class="form-signin w-100 m-auto">
            <form>
                <img class="img-thumbnail shadow rounded-circle mx-auto d-block" src="https://static.vecteezy.com/system/resources/thumbnails/000/602/787/small/83038926.jpg" 
                    alt="Logo Image" width="72" height="57">
                
                <h1 class="d-block mb-5 mt-3 ms-1 text-center">Login</h1>
            
                <div class="form-floating ms-1">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating ms-1">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
            
                <button class="w-100 btn btn-lg btn-primary mt-3 ms-1" type="submit">Login</button>
            </form>
            <small class="d-block mt-3 text-center fs-6 ms-1">Not registered yet? Register <b><a href="/register" class="text-decoration-none">here</a></b>!</small>
        </main>
    </div>
</div>
@endsection