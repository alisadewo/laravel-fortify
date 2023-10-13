@extends('dashboard')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Profile Information</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Profile</li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="card mb-5">
            <div class="card-header">
                Your Profile
            </div>
            <div class="card-body">
                @if (session('status') === "profile-information-updated")
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>  
                @endif
                <form action="{{ route('user-profile-information.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6"> <!-- Atur lebar kolom sesuai kebutuhan -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', auth()->user()->name) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email', auth()->user()->email) }}">
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header">
                Change Password
            </div>
            <div class="card-body">
                @if (session('status') === "password-updated")
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                @endif
                <form action="{{ route('user-password.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6"> <!-- Atur lebar kolom sesuai kebutuhan -->
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" id="current_password">
                                    @error('current_password', 'updatePassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    @error('password', 'updatePassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Password Confimation</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-5">
            <div class="card-header">
                Two Factor Authentication
            </div>
            <div class="card-body">
                @if (session('status') === "password-updated")
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                @endif
                <div class="container">
                    @if (session('status') == 'two-factor-authentication-enabled')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('status') == 'two-factor-authentication-disabled')
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <span>
                        <strong>You have not enabled two factor authentication</strong>
                    </span>
                    <div class="mt-2">
                        When two factor authentication is enabled. you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone's Google Authenticator application
                    </div>

                
                    @if (auth()->user()->two_factor_secret)
                        <div class="mt-3">
                            <span>Two factor authentication is now enabled. Scan the following QR code using your phone's authenticator application</span>
                            <div class="mt-2">
                                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>
                        </div>  

                        <div class="mt-3">
                            <span>Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost</span>
                            <ul class="mt-2">
                                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                    <li class="">{{ $code }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <form action="{{ route("two-factor.disable") }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger mt-4">Disable</button>
                        </form>
                    @else
                        <form action="{{ route('two-factor.enable') }}" method="post">
                            @csrf
                            <button class="btn btn-primary mt-4">Enable</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection