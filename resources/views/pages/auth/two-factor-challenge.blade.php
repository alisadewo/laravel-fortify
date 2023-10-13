@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">QRCode</h3></div>
                    <div class="card-body">
                        <form action="{{ route('two-factor.login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputCode" name="code" type="text" placeholder="name@example.com" />
                                <label for="inputCode">Code</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2 mb-0 float-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Recovery Code</h3></div>
                    <div class="card-body">
                        <form action="{{ route('two-factor.login') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputRecoveryCode" name="recovery_code" type="text" placeholder="Recovery Code" />
                                <label for="inputRecoveryCode">Recovery Code</label>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-2 mb-0 float-end">
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