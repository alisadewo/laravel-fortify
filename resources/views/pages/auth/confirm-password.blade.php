@extends('dashboard')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Confirm Password</h1>
        <div class="card mb-5">
            <div class="card-header">
                Confirm Password
            </div>
            <div class="card-body">
                <form action="{{ route('password.confirm') }}" method="post">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6"> <!-- Atur lebar kolom sesuai kebutuhan -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    @error('password', 'updatePassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-primary">Confirm Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection