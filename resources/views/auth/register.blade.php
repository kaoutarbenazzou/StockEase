@extends('auth.body.main')

@section('content')
<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-9">
           
            <div class="card my-5">
                <div class="card-body p-5 text-center">
                    <div class="h3 fw-light mb-3">Create an Account</div>
                    <div class="small text-muted mb-2">Sign in with social media!</div>
                 
                    <a class="btn btn-icon btn-google mx-1" href="#"><i class="fab fa-google fa-fw fa-sm"></i></a>
                    <a class="btn btn-icon btn-facebook mx-1" href="#"><i class="fab fa-facebook-f fa-fw fa-sm"></i></a>
                    <a class="btn btn-icon btn-github mx-1" href="#"><i class="fab fa-github fa-fw fa-sm"></i></a>
                    
                  
     
                </div>

                <hr class="my-0" />

                <div class="card-body p-5">
                    <div class="text-center small text-muted mb-4">Else, enter your information ⬇️</div>
        
                    <form action="{{ route('register') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            
                            <input class="form-control form-control-solid @error('name') is-invalid @enderror" type="text" id="name" name="name" placeholder="Your full name." value="{{ old('name') }}" autocomplete="off"/>
                            @error('name')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            
                            <input class="form-control form-control-solid @error('username') is-invalid @enderror" type="text" id="username" name="username" placeholder="Your username." value="{{ old('username') }}" autocomplete="off"/>
                            @error('username')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                           
                            <input class="form-control form-control-solid @error('email') is-invalid @enderror" type="text" id="email" name="email" placeholder="Enter your email."  value="{{ old('email') }}" autocomplete="off"/>
                            @error('email')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
           
                        <div class="row gx-3">
                            <div class="col-md-6">

                                <div class="mb-3">
                               
                                    <input class="form-control form-control-solid @error('password') is-invalid @enderror" type="password" id="password" name="password" placeholder="Enter your new password."/>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        <i class="bx bx-radio-circle"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                              
                                <div class="mb-3">
                                    
                                    <input class="form-control form-control-solid @error('password') is-invalid @enderror" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your new password."/>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-success">Create Account</button>
</div>

                    </form>
        
                </div>
                <hr class="my-0" />
                <div class="card-body px-5 py-4">
                    <div class="small text-center">
                        You are already registered?
                        <a href="{{ route('login') }}" style="color: green;">Sign in!</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
