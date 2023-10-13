@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    <div class="card-body">
                        @error('email')
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <span>{{ $message }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                        <form action="{{ url('login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                                <label for="inputEmail">Email address</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" />
                                <label for="inputPassword">Password</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" id="inputRememberPassword" name="remember" type="checkbox" value="1" />
                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                            </div>  
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                @else
                                    <div></div>
                                @endif
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

        
@endsection
        
    