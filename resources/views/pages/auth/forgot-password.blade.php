@extends('layouts.app')

@section('content')
<div id="layoutAuthentication_content">
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                            <form action="{{ route("password.email") }}" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                                    <label for="inputEmail">Email address</label>
                                    @error('email')
                                        <div class="mt-1">
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="{{ route('login') }}">Return to login</a>
                                    <button type="submit" class="btn btn-primary">Reset Password</button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="{{ route("register") }}">Need an account? Sign up!</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection