@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">Verify Your Email Address</div>
                
                <div class="card-body">
                    @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('resent') }}
                        <span>A fresh verification link has been sent to your email address</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                Before proceeding, please check your email for a verification link. if you did not receive the email,
                <form action="{{ route("verification.send") }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">click here to request another</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection