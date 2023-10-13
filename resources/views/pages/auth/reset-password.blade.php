@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf

                            <input type="hidden" name="token" value="{{ request()->token }}">

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" name="email" type="email" placeholder="name@example.com" />
                                <label for="inputEmail">Email address</label>
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPassword" name="password" type="password" placeholder="password" />
                                <label for="inputPassword">Password</label>
                                @error('password')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPasswordConfirm" name="password_confirmation" type="password" placeholder="Confirm password" />
                                <label for="inputPasswordConfirm">Confirm Password</label>
                            </div>

                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection