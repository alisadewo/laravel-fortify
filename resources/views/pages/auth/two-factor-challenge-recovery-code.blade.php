@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    <div class="card-body">
                        <form action="{{ route('two-factor.login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputCode" name="recovery_code" type="text" />
                                <label for="inputCode">Recovery Code</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="{{ url('/two-factor-challenge') }}">Login with Recovery Code?</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>
@endsection