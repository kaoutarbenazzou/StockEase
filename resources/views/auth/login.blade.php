@extends('auth.body.main')

@section('content')
<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <div class="card my-5">
                <div class="card-body p-5 text-center">
                    <div class="h3 fw-light mb-3">Welcome, Sign In!</div>
                    <a class="btn btn-icon btn-google mx-1" href="#"><i class="fab fa-google fa-fw fa-sm"></i></a>
                    <a class="btn btn-icon btn-facebook mx-1" href="#"><i class="fab fa-facebook-f fa-fw fa-sm"></i></a>
                    <a class="btn btn-icon btn-github mx-1" href="#"><i class="fab fa-github fa-fw fa-sm"></i></a>
                    

                </div>
                <hr class="my-0" />
                <div class="card-body p-5">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="input_type">Enter email or username:</label>
                            <input
                                class="form-control form-control-solid @if($errors->get('email') OR $errors->get('username')) is-invalid @endif"
                                type="text"
                                id="input_type"
                                name="input_type"
                                placeholder=""
                                value="{{ old('input_type') }}"
                                autocomplete="off"
                            />
                            @if ($errors->get('email') OR $errors->get('username'))
                                <div class="invalid-feedback">
                                    Incorrect username or password.
                                </div>
                            @endif
                        </div>
        
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="password">Enter password:</label>
                            <input
                                class="form-control form-control-solid @if($errors->get('email') OR $errors->get('username')) is-invalid @endif @error('password') is-invalid @enderror"
                                type="password"
                                id="password" name="password"
                                placeholder=""
                            />
                            @error('password')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3"><a class="small" href="#" style="color: red;">I forgot my password.</a></div>
    
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>

                    </form>
     
                </div>
                <hr class="my-0" />
                <div class="card-body px-5 py-4">
                    <div class="small text-center">
                        New user?
                        <a href="{{ route('register') }} " style="color: green";>Create an account!</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
